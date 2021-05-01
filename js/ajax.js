
function encodeForAjax(data) {
    return Object.keys(data).map(function (k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

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

