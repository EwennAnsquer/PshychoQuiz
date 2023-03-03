DROP DATABASE IF EXISTS QUIZZ;

CREATE DATABASE IF NOT EXISTS QUIZZ;
USE QUIZZ;
# -----------------------------------------------------------------------------
#       *TABLE : TYPEQUESTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPEQUESTION
 (
   ID SMALLINT AUTO_INCREMENT PRIMARY KEY,
   NOMTYPE CHAR(32) NOT NULL 
 ) ;

# -----------------------------------------------------------------------------
#       *TABLE : SCOREFERMEE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SCOREFERMEE
 (
   IDSCOREF SMALLINT AUTO_INCREMENT PRIMARY KEY,
   REP  BOOLEAN,
   SCOREFRES INT DEFAULT 0,
   SCOREFDEV INT DEFAULT 0 
 ) ;

# ----------------------------------------------------------------------------
#       *TABLE : SCORECH
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SCORECH
 (
   IDSCORECH SMALLINT AUTO_INCREMENT PRIMARY KEY,
   NBPTMULTRES INT DEFAULT 0,
   NBPTMULTDEV INT DEFAULT 0
 ) ;

# -----------------------------------------------------------------------------
#       *TABLE : ORIGINE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ORIGINE
 (
   IDORIGINE SMALLINT AUTO_INCREMENT PRIMARY KEY,
   NOM CHAR(62) NOT NULL 
 ) ;

# -----------------------------------------------------------------------------
#       *TABLE : AVIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AVIS
 (
   IDAVIS SMALLINT AUTO_INCREMENT PRIMARY KEY,
   TITRE CHAR(62) NOT NULL,
   SPE CHAR(1) DEFAULT 0,
   PARAG1 VARCHAR(2400) NOT NULL,
   PARAG2 VARCHAR(2400) NOT NULL,
   PARAG3 VARCHAR(2400) NOT NULL,
   BORNEINF INT DEFAULT 0,
   BORNESUP INT DEFAULT 2000
 ) ;

# -----------------------------------------------------------------------------
#      * TABLE : SONDE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SONDE
 ( IDSONDE SMALLINT AUTO_INCREMENT  PRIMARY KEY,
   IDORIGINE SMALLINT REFERENCES ORIGINE(IDORIGINE),
   ANNEE INT DEFAULT 2023,
   SEXE CHAR(1) DEFAULT 'M'
 ) ;

# -----------------------------------------------------------------------------
#      * TABLE : QUESTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS QUESTION
 ( IDQUESTION SMALLINT AUTO_INCREMENT  PRIMARY KEY,
   LIBELLE VARCHAR(1200) NOT NULL,
   ENJEU VARCHAR(1200) NOT NULL,
   IDTYPEQUESTION INTEGER REFERENCES  TYPEQUESTION(ID),
   IDSCOREFERMEE INTEGER REFERENCES  SCOREFERMEE(IDSCOREF),
   IDSCORECH INTEGER REFERENCES SCORECH(IDSCORECH)) 
 ;

# -----------------------------------------------------------------------------
#      * TABLE : REPONSEASSOCIEE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REPONSEASSOCIEE
 ( IDQUESTION SMALLINT REFERENCES QUESTION(IDQUESTION),
   IDSONDE SMALLINT REFERENCES SONDE(IDSONDE),
   VALEURRES SMALLINT DEFAULT 0,
   VALEURRDEV SMALLINT DEFAULT 0
 ) ;

START TRANSACTION;

INSERT INTO TYPEQUESTION(NOMTYPE) VALUES ('fermee'), ('echelle');


INSERT INTO SCOREFERMEE(REP, SCOREFRES,SCOREFDEV ) VALUES (1,0,0),(1,2,4),(1,4,0),(1,0,4);


INSERT INTO SCORECH(NBPTMULTRES,NBPTMULTDEV) VALUES (0,0),(1,1),(0,1),(0,2);
 
INSERT INTO ORIGINE(NOM ) VALUES ('G NSI'), ('STI2DSIN'), ('STI2DNONSIN'), ('G MATHS'), ('STMG'), ('PROSNRISC'),('PROSAUTRE') ,('PROSNNONRISC'),('RECURRENTIUT'),('RECURRENTAUTRE'),('AUTRE');




INSERT INTO AVIS(TITRE,SPE,PARAG1,PARAG2,PARAG3, BORNEINF,BORNESUP) VALUES ('Totally d�v ',1,'Un.e vrai SLAMiste. 
Inventez votre petit monde en c#, tout en �tant, attirer par le Python qui sommeille au fond de votre disque dur. ','Vous danseriez tout aussi bien sur un air de Java pour d�velopper votre site web. Vous pourriez passer des nuits � coder et ne compter pas vos heures pour d�busquer le bug, le moindre indice et le temps glisse sur vous.
 En �quipe, c�est toujours plus agile. ','Votre patience est l�gendaire derri�re votre �cran, difficile de vous en extraire. Bon, quelquefois, votre code est sur un autre domaine que l�informatique : le commerce, la gestion des emplois du temps,� 
Face � des utilisateurs un peu hackers ou pas d�gourdis, vous pouvez �tre perfectionniste pour �viter les bugs de saisie. Et avec, tout cela, vous avez encore le temps de voir les nouveaut�s qui pourraient am�liorer votre pratique.
',20,1000);



INSERT INTO SONDE(IDORIGINE ,ANNEE ,SEXE ) VALUES (2,2023,'N');



INSERT INTO QUESTION(LIBELLE ,ENJEU, IDTYPEQUESTION ,   IDSCOREFERMEE ,   IDSCORECH ) VALUES
      ('Supportez-vous de "perdre" du temps � r�soudre des erreurs','mise en jambe',1,2,1),
      ('A quel point �tes-vous � l"aise avec les Syst�mes d"exploitation','Approche',2,1,2),
      ('D�pannez-vous souvent les probl�mes informatiques de votre famille','Approche',1,3,1),
      ('Avez-vous d�j� fouin� dans votre PC','Approche',1,2,NULL),
      ('A quel point aimez-vous personnaliser vos projets/r�alisations','entamereflexion',2,1,3),
      ('A quel point �tes-vous perfectionniste','entamereflexion',2,1,4);
				
 
 
 INSERT INTO REPONSEASSOCIEE(IDQUESTION,IDSONDE,VALEURRES,VALEURRDEV) VALUES
	(1,1,0,0),
	(2,1,1,1),
	(3,1,4,0),
	(4,1,4,0),
	(5,1,0,1),
	(6,1,3,6); 



COMMIT;

