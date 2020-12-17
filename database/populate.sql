PRAGMA foreign_keys = ON;
.mode columns
.headers on
.nullvalue NULL

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
