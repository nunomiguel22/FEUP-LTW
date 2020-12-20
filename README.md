# Elements:
 - Nuno Marques (201708997) 
 - João Rodrigo (201705110)
 
# Credentials (username/password (role))
 - utilizador/asdasd2 (client)
 - myuser/asdasd2 (client)
 - myuser/asdasd2 (client)

# Libraries:
 - No external libraries were used for this project

# Features:
 - Security
    
 ```php
verifyCSRF();
include_once(dirname(__FILE__)."/../../includes/login_only.php");
validateAndFilter($_POST, "name", "location", "age", "species", "size");    
```

     - XSS: yes
        -No untrusted data is output
        -Input is filtered:
            
```php
            function validateAndFilter(&$array, ...$vars)
            {
                $missing = [];

                foreach ($vars as $var) {
                if (!isset($array[$var])) {
                    array_push($missing, 'Request missing element \''.$var.'\' ');
                } else {
                    $array[$var] = preg_replace('/[^a-zA-Z0-9çéèêáàãôóòíìúù \']/', '', $array[$var]);
                }
               "..." 
             }     
```

     - CSRF: yes
     
```php
function generate_random_token()
{
    return bin2hex(openssl_random_pseudo_bytes(32));
}

function verifyCSRF()
{
    if (!isset($_POST["csrf"]) || ($_SESSION['csrf'] !== $_POST["csrf"])) {
        echo json_encode("CSRF token mismatch.");
        die();
    }
}

function insertCSRFToken()
{
    echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
}

function insertHeadCSRFToken()
{
    echo '<head csrf="' . $_SESSION["csrf"] . '">';
}   
```
     - SQL using prepare/execute: yes
     - Passwords: PHP Hashing algorithm(BCRYPT)
     - Data Validation: regex / php / html / ajax
```html
     <input type="password" id="sp_password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,10}$"
                  placeholder="Palavra-passe (5 a 10 Caracteres)" name="password" required>
```

 - Technologies
     - Separated logic/database/presentation: yes
     - Semantic HTML tags: yes
     - Responsive CSS: yes
     - Javascript: yes
     - Ajax: yes
```javascript     
 function ajaxRequest(page, type = "GET", func, params = {}) {

    let request = new XMLHttpRequest();
    params.csrf = document.head.getAttribute("csrf");
    let paramUrl = encodeForAjax(params);
    type = type.toLowerCase();

    if (type == "get") {
        request.open(type, page + "?" + paramUrl, true);
        request.send();
    } else if (type == "post") {
        request.open(type, page, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send(paramUrl);
    }

    request.onload = function (data) {
        if (this.readyState == 4 && this.status == 200) {
            let result = this.responseText;
            try {
                result = JSON.parse(result);

            } catch (e) { }
            if (func != null)
                func(result);
        }
    };
}
```
     - REST API: no

  - Usability:
     - Error/success messages: yes
     - Forms don't lose data on error: yes

