-- verifier et supprime si ma base de donnee existe
drop database if Exists final_ecom1;
-- creation de ma base donnee
create database final_ecom1;
use final_ecom1;
-- creation de mes tables
create table Role(
    id int primary key auto_increment not null,
    titre varchar(25)
);

create table Utilisateur(
  id int primary key auto_increment not null,
  nom varchar(50) not null,
  prenom varchar(50),
  email varchar(150) not null,
  mot_de_passe varchar(255) not null,
  telephone varchar(50),
  date_naissance varchar(50),
  date_de_creation Datetime,
  date_mise_jour Datetime
);


create table RoleUtilisateur(
    id_utilisateur int,
    id_role int,
    foreign key(id_role) REFERENCES Role(id)
);

create table Adresse(
    id int primary key auto_increment not null,
    rue varchar(50) not null,
    code_postal varchar(10),
    ville varchar(50) not null,
    pays varchar(50) not null,
    numero_appartement varchar(10)
);

create table AdresseUtilisateur(
    id_utilisateur int,
    id_Adresse int
);

create table Produit(
    id int primary key auto_increment not null,
    nom varchar(50) not null,
    description varchar(255),
    prixUnitaire float not null,
    quantite int 
);

create table Image(
    id int primary key auto_increment,
    chemin varchar(255),
    id_produit int
);

-- modifier la table pour attribuer le nom de la constraint
alter table RoleUtilisateur
add constraint fk_utilisateur_role
foreign key(id_utilisateur) REFERENCES Utilisateur(id);

alter table Image
add constraint fk_image_produit
foreign key(id_produit) REFERENCES Produit(id);

alter table AdresseUtilisateur
add constraint fk_utilisateur_adresse 
foreign key(id_utilisateur) REFERENCES Utilisateur(id) 
on update cascade on delete cascade,
add constraint fk_Adresse_Utilisateur
foreign key(id_Adresse) REFERENCES Adresse(id)
on update cascade on delete cascade;

-- insertion dans ma table role
INSERT INTO Role(titre) 
    values ("admin"),
            ("client");


-- insertion dans ma table utilisateur
-- l'utilisateur ivan a comme mot de passe Tom1234
INSERT INTO Utilisateur(nom,prenom,email,mot_de_passe,date_de_creation)
            values ("ivan","jose","ivan@gmail.ca","$2y$10$pmTgU.CA3J8ppEvvKs7IkOxCCtCGBeNyf1Scvoy.TCmjQpZzzHfjK","2023-07-07 13:25:00");

INSERT INTO RoleUtilisateur(id_utilisateur,id_role)
values(1,1);

