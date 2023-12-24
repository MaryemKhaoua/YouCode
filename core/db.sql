CREATE TABLE roles(
    id_role INT PRIMARY KEY AUTO_INCREMENT,
    role_type varchar(30)
);

CREATE TABLE users(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom varchar(30),
    prenom varchar(30),
    email varchar(30),
    password varchar(30),
    id_role INT,
    FOREIGN KEY (id_role) references roles (id_role) 
);

CREATE TABLE classes(
    id_classes INT PRIMARY KEY AUTO_INCREMENT,
    id_apprenant INT,
    id_formateur INT,
    FOREIGN KEY (id_apprenant) references users (id_user),
    FOREIGN KEY (id_formateur) references users (id_user)
);
CREATE TABLE authority(
    id_authority INT PRIMARY KEY AUTO_INCREMENT,
    authority_type varchar(225)
);
CREATE TABLE userAuthority(
    id_userAuth INT PRIMARY KEY AUTO_INCREMENT,
    id_auth INT,
    id_user INT,
    FOREIGN KEY (id_auth) references authority (id_authority),
    FOREIGN KEY (id_user) references users (id_user)
);