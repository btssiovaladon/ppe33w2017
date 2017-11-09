DROP DATABASE IF EXISTS ppeamis;

CREATE DATABASE IF NOT EXISTS ppeamis;
USE ppeamis;
# -----------------------------------------------------------------------------
#       TABLE : FONCTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FONCTION
 (
   NUMFONCTION SMALLINT(1) NOT NULL  ,
   NOMFONCTION CHAR(32) NULL  
   , PRIMARY KEY (NUMFONCTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : REPAS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REPAS
 (
   NUMREPAS SMALLINT(1) NOT NULL  ,
   HEUREREPAS TIME NULL  ,
   DATEREPAS DATE NULL  ,
   PRIXREPAS INTEGER(2) NULL  ,
   NBRPLACESREPAS SMALLINT(1) NULL  ,
   LIEUREPAS CHAR(32) NULL  
   , PRIMARY KEY (NUMREPAS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ACTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ACTION
 (
   NUMACTION SMALLINT(1) NOT NULL  ,
   NUMAMIS SMALLINT(2) NOT NULL  ,
   NUMEROCOMMISSION SMALLINT(1) NULL  ,
   LIBELLEACTION CHAR(32) NULL  ,
   MONTANTACTION INTEGER(2) NULL  ,
   DATEACTION DATE NULL  ,
   DUREEACTION CHAR(32) NULL  
   , PRIMARY KEY (NUMACTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ACTION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ACTION_AMIS
     ON ACTION (NUMAMIS ASC);

CREATE  INDEX I_FK_ACTION_COMMISSION
     ON ACTION (NUMEROCOMMISSION ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMMISSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMISSION
 (
   NUMEROCOMMISSION SMALLINT(1) NOT NULL  ,
   LIBELLECOMMISSION CHAR(32) NULL  
   , PRIMARY KEY (NUMEROCOMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : AMIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AMIS
 (
   NUMAMIS SMALLINT(2) NOT NULL  ,
   NUMFONCTION SMALLINT(1) NULL  ,
   NOMAMIS CHAR(32) NULL  ,
   PRENOMAMIS CHAR(32) NULL  ,
   ADRESSERUEAMIS CHAR(32) NULL  ,
   ADRESSECOMPLEMENTAMIS CHAR(32) NULL  ,
   ADRESSEVILLEAMIS CHAR(32) NULL  ,
   CODEPOSTALAMIS CHAR(32) NULL  ,
   TELEPHONEAMIS CHAR(10) NULL  ,
   MAILAMIS CHAR(32) NULL  ,
   DATEENTREEAMIS DATE NULL  
   , PRIMARY KEY (NUMAMIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE AMIS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_AMIS_FONCTION
     ON AMIS (NUMFONCTION ASC);

# -----------------------------------------------------------------------------
#       TABLE : PARAMETRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARAMETRE
 (
   NUM_PARAMETRE SMALLINT(1) NOT NULL  ,
   MONTANTCOTISATION CHAR(32) NULL  
   , PRIMARY KEY (NUM_PARAMETRE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARTICIPER
 (
   NUMAMIS SMALLINT(2) NOT NULL  ,
   NUMACTION SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUMAMIS,NUMACTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPER_AMIS
     ON PARTICIPER (NUMAMIS ASC);

CREATE  INDEX I_FK_PARTICIPER_ACTION
     ON PARTICIPER (NUMACTION ASC);

# -----------------------------------------------------------------------------
#       TABLE : BUREAU_COMMISSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS BUREAU_COMMISSION
 (
   NUMAMIS SMALLINT(2) NOT NULL  ,
   NUMEROCOMMISSION SMALLINT(1) NOT NULL  ,
   NUMFONCTION SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUMAMIS,NUMEROCOMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE BUREAU_COMMISSION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_BUREAU_COMMISSION_AMIS
     ON BUREAU_COMMISSION (NUMAMIS ASC);

CREATE  INDEX I_FK_BUREAU_COMMISSION_COMMISSION
     ON BUREAU_COMMISSION (NUMEROCOMMISSION ASC);

CREATE  INDEX I_FK_BUREAU_COMMISSION_FONCTION
     ON BUREAU_COMMISSION (NUMFONCTION ASC);

# -----------------------------------------------------------------------------
#       TABLE : INVITER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INVITER
 (
   NUMREPAS SMALLINT(1) NOT NULL  ,
   NUMAMIS SMALLINT(2) NOT NULL  ,
   NOMBREPERSONNES SMALLINT(1) NULL  
   , PRIMARY KEY (NUMREPAS,NUMAMIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE INVITER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_INVITER_REPAS
     ON INVITER (NUMREPAS ASC);

CREATE  INDEX I_FK_INVITER_AMIS
     ON INVITER (NUMAMIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : PARRAINER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PARRAINER
 (
   NUMAMIS SMALLINT(2) NOT NULL  ,
   NUMAMIS_1 SMALLINT(2) NOT NULL  
   , PRIMARY KEY (NUMAMIS,NUMAMIS_1) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARRAINER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARRAINER_AMIS
     ON PARRAINER (NUMAMIS ASC);

CREATE  INDEX I_FK_PARRAINER_AMIS1
     ON PARRAINER (NUMAMIS_1 ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE ACTION 
  ADD FOREIGN KEY FK_ACTION_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE ACTION 
  ADD FOREIGN KEY FK_ACTION_COMMISSION (NUMEROCOMMISSION)
      REFERENCES COMMISSION (NUMEROCOMMISSION) ;


ALTER TABLE AMIS 
  ADD FOREIGN KEY FK_AMIS_FONCTION (NUMFONCTION)
      REFERENCES FONCTION (NUMFONCTION) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_ACTION (NUMACTION)
      REFERENCES ACTION (NUMACTION) ;


ALTER TABLE BUREAU_COMMISSION 
  ADD FOREIGN KEY FK_BUREAU_COMMISSION_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE BUREAU_COMMISSION 
  ADD FOREIGN KEY FK_BUREAU_COMMISSION_COMMISSION (NUMEROCOMMISSION)
      REFERENCES COMMISSION (NUMEROCOMMISSION) ;


ALTER TABLE BUREAU_COMMISSION 
  ADD FOREIGN KEY FK_BUREAU_COMMISSION_FONCTION (NUMFONCTION)
      REFERENCES FONCTION (NUMFONCTION) ;


ALTER TABLE INVITER 
  ADD FOREIGN KEY FK_INVITER_REPAS (NUMREPAS)
      REFERENCES REPAS (NUMREPAS) ;


ALTER TABLE INVITER 
  ADD FOREIGN KEY FK_INVITER_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE PARRAINER 
  ADD FOREIGN KEY FK_PARRAINER_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE PARRAINER 
  ADD FOREIGN KEY FK_PARRAINER_AMIS1 (NUMAMIS_1)
      REFERENCES AMIS (NUMAMIS) ;

