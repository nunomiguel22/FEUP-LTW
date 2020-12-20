PRAGMA foreign_keys = ON;
.mode columns
.headers on
.nullvalue NULL


INSERT Into User(id, username, pwhash, name, email) VALUES(1, "utilizador",	"$2y$11$VMIbb52iH0/9hSO2giwlbuFn12DuEKxMYcvcU7SdDTWr9LA30Y3xu",	"ddddd", "email@email.com");
INSERT Into User(id, username, pwhash, name, email) VALUES(2, "myuser",	"$2y$11$gKOfcIKXfoJx5vPTCLCv5OnWsihWKC1aKgCz.zkLzmzzSZ62CsyqC",	"myname", "myemail@email.com");
INSERT Into User(id, username, pwhash, name, email) VALUES(3, "myuser3", "$2y$11$TFyiW8ge71oLjjics0ic.Oh9gCjijPRKCEkeVYCwccFZOTkDvgNxS", "asd", "asd@email.com");

INSERT INTO Photo(path)VALUES("/images/Pet1.jpg");
INSERT INTO Photo(path)VALUES("/images/Pet2.jpg");
INSERT INTO Photo(path)VALUES("/images/Pet3.jpg");
INSERT INTO Photo(path)VALUES("/images/Pet4.jpg");
INSERT INTO Photo(path)VALUES("/images/Pet5.jpg");
INSERT INTO Photo(path)VALUES("/images/Pet6.jpg");
INSERT INTO Photo(path)VALUES("/images/Pet7.jpg");

INSERT INTO Pet(idphoto, idowner, name, age, location, species, size, status) VALUES (1, 1, "hulk", 9, "porto", "cão", "médio", 0);
INSERT INTO Pet(idphoto, idowner, name, age, location, species, size, status) VALUES (2, 2, "cao", 3, "porto", "cão", "pequeno", 1);
INSERT INTO Pet(idphoto, idowner, name, age, location, species, size, status) VALUES (3, 1, "gato", 9, "porto", "gato", "médio", 1);
INSERT INTO Pet(idphoto, idowner, name, age, location, species, size, status) VALUES (4, 2, "covid", 4, "lisboa", "gato", "médio", 1);
INSERT INTO Pet(idphoto, idowner, name, age, location, species, size, status) VALUES (5, 1, "shiba", 3, "madeira", "cão", "médio", 0);
INSERT INTO Pet(idphoto, idowner, name, age, location, species, size, status) VALUES (6, 3, "asd", 4, "asd", "cão", "pequeno", 1);

INSERT INTO PetPhotos(idpet, idphoto) VALUES(1, 1);
INSERT INTO PetPhotos(idpet, idphoto) VALUES(2, 2);
INSERT INTO PetPhotos(idpet, idphoto) VALUES(3, 3);
INSERT INTO PetPhotos(idpet, idphoto) VALUES(4, 4);
INSERT INTO PetPhotos(idpet, idphoto) VALUES(5, 5);
INSERT INTO PetPhotos(idpet, idphoto) VALUES(6, 6);
INSERT INTO PetPhotos(idpet, idphoto) VALUES(1, 7);

INSERT INTO Comments(id, idpet, idowner, idparent, message) VALUES(1, 1, 1, 0, "comentario teste1");
INSERT INTO Comments(id, idpet, idowner, idparent, message) VALUES(2, 2, 1, 0, "comentario teste2");
INSERT INTO Comments(id, idpet, idowner, idparent, message) VALUES(3, 3, 1, 0, "comentario teste3");
INSERT INTO Comments(id, idpet, idowner, idparent, message) VALUES(4, 4, 1, 0, "comentario teste4");
INSERT INTO Comments(id, idpet, idowner, idparent, message) VALUES(5, 5, 1, 0, "comentario teste5");
INSERT INTO Comments(id, idpet, idowner, idparent, message) VALUES(6, 6, 1, 0, "comentario teste6");


INSERT INTO Proposal(id, idpet, iduser, idowner, message, status) VALUES(1, 2, 1, 2, "asd", 1);
INSERT INTO Proposal(id, idpet, iduser, idowner, message, status) VALUES(2, 3, 2, 1, "a minha proposta", 1);

INSERT INTO Favorites(id, idpet, iduser) VALUES(2, 4, 1);


