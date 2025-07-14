
create database product;
use product;

CREATE TABLE membre(
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_naissance DATE,
    genre VARCHAR(20),
    email VARCHAR(100),
    ville VARCHAR(100),
    mdp VARCHAR(100),
    img VARCHAR(100)
);

CREATE TABLE categorie_objet(
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(50)
);

CREATE TABLE objet(
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(50),
    id_categorie INT,
    id_membre INT,
    img VARCHAR(100) DEFAULT 'default.jpg',
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre),
    FOREIGN KEY (id_categorie) REFERENCES categorie_objet(id_categorie)

);

CREATE TABLE images_objet(
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(100),
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet)
);

CREATE TABLE emprunt(
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre),
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet)

);

INSERT INTO membre (nom, date_naissance, genre, email, ville, mdp, img) VALUES
('Alex','1995-04-12', 'M', 'alex@example.com', 'Antananarivo', 'alex', 'alex.jpg'),
('Sarah','2000-07-25', 'F', 'sarah@example.com', 'Toamasina', 'sarah', 'sarah.png'),
('Jean','1988-12-05', 'M', 'jean@example.com', 'Fianarantsoa', 'jean', 'jean.jpeg'),
('Lina','1992-10-18', 'F', 'lina@example.com', 'Mahajanga', 'lina', 'lina.jpg');

INSERT INTO categorie_objet (nom_categorie) VALUES
('Esthetique'),
('Bricolage'),
('Mecanique'),
('Cuisine');

INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES

('Seche-cheveux', 1, 1),
('Tournevis', 2, 1),
('Perceuse', 2, 1),
('Miroir maquillage', 1, 1),
('Blender', 4, 1),
('Poele antiadhesive', 4, 1),
('Cle à molette', 3, 1),
('Creme visage', 1, 1),
('Casque audio', 1, 1),
('Scie electrique', 2, 1),

('Lisseur cheveux', 1, 2),
('Marteau', 2, 2),
('Casserole inox', 4, 2),
('Wok', 4, 2),
('Trousse maquillage', 1, 2),
('Visseuse', 2, 2),
('Creme solaire', 1, 2),
('Cle dynamometrique', 3, 2),
('Mixer', 4, 2),
('etagere murale', 2, 2),

('Grille-pain', 4, 3),
('Fard à paupiere', 1, 3),
('Ponceuse', 2, 3),
('Cle Allen', 3, 3),
('Melangeur cuisine', 4, 3),
('Tournevis etoile', 2, 3),
('Tondeuse cheveux', 1, 3),
('Batterie voiture', 3, 3),
('Creme main', 1, 3),
('Tapis antiderapant', 2, 3),

('Aspirateur', 2, 4),
('Lime à ongles', 1, 4),
('Friteuse', 4, 4),
('Coffret outils', 2, 4),
('Pate coiffante', 1, 4),
('Robot patissier', 4, 4),
('Cric hydraulique', 3, 4),
('Ciseaux coiffure', 1, 4),
('Four micro-ondes', 4, 4),
('Rape cuisine', 4, 4);

INSERT INTO emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),
(5, 3, '2025-07-02', '2025-07-12'),
(12, 1, '2025-07-03', '2025-07-15'),
(20, 4, '2025-07-04', '2025-07-14'),
(25, 2, '2025-07-05', '2025-07-16'),
(33, 1, '2025-07-06', '2025-07-18'),
(8, 4, '2025-07-07', '2025-07-17'),
(18, 3, '2025-07-08', '2025-07-20'),
(29, 2, '2025-07-09', '2025-07-19'),
(35, 3, '2025-07-10', '2025-07-21');

create or replace view v_membre_objet as select membre.*, id_categorie as o_idc, objet.img as o_img,id_objet as o_ido, nom_objet from membre 
join objet on membre.id_membre = objet.id_membre;

create or replace view v_objet_categorie as select categorie_objet.*, v_membre_objet.* from categorie_objet join v_membre_objet on o_idc= categorie_objet.id_categorie;

create or replace view v_objet_emprunt as select o.id_objet as o_ido, o.nom_objet, o.id_categorie o_idc, o.id_membre o_idm,
e.id_emprunt, e.date_emprunt, e.date_retour from objet o join emprunt e on o.id_objet=e.id_objet;

