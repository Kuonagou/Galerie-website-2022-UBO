--ACTUALITES--

1. 	insert into T_ACTUALITE_ACT values (NULL,'inserer titre','inserer texte',curdate(),'KuGou');
2. 	select act_num, act_titre, act_texte, act_datepublication from T_ACTUALITE_ACT 
	where act_datepublication = (select max(act_datepublication) from T_ACTUALITE_ACT);
3.  select act_num, cpt_pseudo from T_ACTUALITE_ACT;
4.  select act_num, act_texte, cpt_pseudo from T_ACTUALITE_ACT order by act_num DESC limit 5;
5.  update T_ACTUALITE_ACT set act_texte = 'yup yup yup' where act_num=6;
6.  delete from T_ACTUALITE_ACT where act_num = 6;
7.  delete from T_ACTUALITE_ACT where act_datepublication < '2022-00-00';

--PROFILS ET COMPTES--

8.  insert into T_COMPTEUTILISATEUR_CPT values ('pseudo1',MD5('mdp'));
	insert into T_PROFIL_PRO values ('nom','prenom','mail','D','O',curdate(),'pseudo1');
9.  select count(*) from T_COMPTEUTILISATEUR_CPT join T_PROFIL_PRO using (cpt_pseudo)
	where cpt_pseudo='pseudo1' and cpt_mdp=MD5('mdp') and pro_valide='A';
10.	select * from T_PROFIL_PRO where cpt_pseudo='organisateur1' ;
11.	select pro_role from T_PROFIL_PRO where pro_nom='Gouhier' and pro_prenom='Juliette';
12.	update T_PROFIL_PRO set pro_nom='Durand', pro_prenom='Yann', pro_mail='mdurand@gmail.com' 
	where cpt_pseudo='mdurand';
13.	update T_COMPTEUTILISATEUR_CPT set cpt_mdp=MD5('DUUUUUUUUrand') where cpt_pseudo='mdurand' ;
14.	select * from T_COMPTEUTILISATEUR_CPT natural join T_PROFIL_PRO;
15.	update T_PROFIL_PRO set pro_valide='D' where cpt_pseudo='mdurand';

--CONFIGURATION DE L'EXPOSITION--

16.	INSERT INTO `T_CONFIGURATION_CFG` 
(`CFG_INTITULE`, `CFG_DATEDEBUT`, `CFG_DATEFIN`, `CFG_PRESENTATION`, `CFG_LIEU`, `CFG_DATEVERNISSAGE`, `CFG_TEXTEBIENVENUE`);
 VALUES ('La couleur et son histoire', '2022-01-31', '2022-06-30', 'Plusieurs exposant viendront présenter leur utilisation et leur connaissance sur la couleur.', 'Médiathèque de Brest au Capucins', NULL, 'Bienvenue au capucins pour cette exposition haute en couleur !');
17.	select count(*) from T_CONFIGURATION_CFG; 
18.	select *, Datediff(CFG_DATEVERNISSAGE,now()) as 'Vernissage dans/jours' from T_CONFIGURATION_CFG;
19.	update T_CONFIGURATION_CFG set CFG_INTITULE='La couleur, histoire de la couleur',
 CFG_DATEVERNISSAGE='2022-03-24', CFG_LIEU='Brest Médiathèque des Capucins';
20.	delete from T_CONFIGURATION_CFG ;

--VISITEURS--

21.	INSERT INTO `T_VISITEUR_VIS` VALUES (NULL, '000000000000005', current_timestamp(), NULL, NULL, NULL, 'KuGou');
22.	select vis_num, vis_mail,com_num, com_text from T_VISITEUR_VIS 
	left outer join T_COMMENTAIRE_COM using (vis_num);
23.	delete from T_COMMENTAIRE_COM where vis_num='1';
	delete from T_VISITEUR_VIS where vis_num='1' ;
24.	select (count(distinct vis_num)*100)/(select count(distinct vis_num) from T_VISITEUR_VIS) 
	as pourcentage_de_commentaire from T_VISITEUR_VIS 
	left outer join T_COMMENTAIRE_COM using (vis_num) where com_num is NULL  /*ou bien not like 'NULL'*/;
25.	
	insert into T_COMMENTAIRE_COM values (NULL,curdate(),'Merveilleuse exposition de ******','4','C')
	update T_VISITEUR_VIS set vis_nom='Ragou', vis_prenom='Froid', vis_mail='froi.ragou@gmail.com' where vis_num=4 and vis_mdp='000000000000003'
and NOW()>=vis_dateheure
and
NOW()<= (select timestampadd(hour,3, vis_dateheure) where vis_num=4 and vis_mdp='000000000000003');

26.	update T_COMMENTAIRE_COM set com_etat='C' where com_num=3;
27.	select * from T_COMMENTAIRE_COM where com_etat='P';
28.	select com_text, vis_mail from T_COMMENTAIRE_COM natural join T_VISITEUR_VIS;	
29.	delete from T_COMMENTAIRE_COM  where vis_num=(select vis_num from T_VISITEUR_VIS where vis_num =4 and vis_mdp='000000000000005');
	update T_COMMENTAIRE_COM set com_text="new com" where  vis_num=(select vis_num from T_VISITEUR_VIS where vis_num=4 and vis_mdp='000000000000005');

--OEUVRES EXPOSANTS--

30.	insert into T_OEUVRE_OEU values(NULL,'testtt','jolie description',current_timestamp(),'blablablabla voici le lien de l image');
31.	select oeu_intitule, oeu_fichierimage,oeu_description from T_OEUVRE_OEU;
32.	select * from T_OEUVRE_OEU where oeu_code=12;
33.	select exp_nom, exp_textbio, exp_urlsite, exp_ficimage from T_EXPOSANT_EXP; 
34.	select * from T_EXPOSANT_EXP where EXP_NUM=3;
35.	select oeu_intitule, oeu_fichierimage from T_OEUVRE_OEU 
	where oeu_code in(
    select un.oeu_code from TJ_PRESNTE_PRE as un
    join TJ_PRESNTE_PRE as deux	where un.exp_num!=deux.exp_num 
    and un.oeu_code=deux.oeu_code
	);
36. select * from T_OEUVRE_OEU natural join TJ_PRESNTE_PRE natural join T_EXPOSANT_EXP;
37. select distinct un.exp_num from TJ_PRESNTE_PRE as un join TJ_PRESNTE_PRE as deux 
	where un.exp_num!=deux.exp_num and un.oeu_code=deux.oeu_code;
38. delete from TJ_PRESNTE_PRE where exp_num=8 and oeu_code not in 
	(select oeu_code from TJ_PRESNTE_PRE group by oeu_code having count(exp_num)>1);
	/* ou bien */
	delete from TJ_PRESNTE_PRE where exp_num=8 and oeu_code not in 
		(select un.oeu_code from TJ_PRESNTE_PRE as un join TJ_PRESNTE_PRE as deux 
		 where un.exp_num!=deux.exp_num and un.oeu_code=deux.oeu_code);
39.	delete from T_OEUVRE_OEU where oeu_code=18;
	delete from TJ_PRESNTE_PRE wwhere oeu_code=18;
40. INSERT INTO `T_EXPOSANT_EXP` (`EXP_NUM`, `EXP_NOM`, `EXP_PRENOM`, `EXP_TEXTBIO`, `EXP_MAIL`, `EXP_URLSITE`, `EXP_FICIMAGE`, `CPT_PSEUDO`) 
	VALUES (NULL, 'test', 'testeur', 'voila bon bah ceci est un test', 'zehfbzbvh.test@gmail.com', 'cool coool ce site web', 'e voile une belle image', 'KuGou');
	
	INSERT INTO `T_OEUVRE_OEU` (`OEU_CODE`, `OEU_INTITULE`, `OEU_DESCRIPTION`, `OEU_DATECREATION`, `OEU_FICHIERIMAGE`) 
	VALUES (NULL, 'quel beau test', 'voila une belle descirption de ce test', current_timestamp(), 'lalalalal');
	
	INSERT INTO `TJ_PRESNTE_PRE` (`EXP_NUM`, `OEU_CODE`) VALUES ('7', '20');

	update T_OEUVRE_OEU set oeu_description='12331', oeu_intitule='ceci est une fausse oeuvre', oeu_fichierimage='en voila une super lien d image1'
	where oeu_code='20';
	update T_EXPOSANT_EXP set exp_nom='pas mal ce nom', exp_prenom='joli prenom', exp_ficimage='superbe photo de cet exposant'
	where exp_num='7';
	
41. delete from TJ_PRESNTE_PRE where exp_num=7 and oeu_code=20;
	insert into TJ_PRESNTE_PRE values ('7' , '20');

42. delete from T_EXPOSANT_EXP where exp_num 
	not in (select distinct exp_num from TJ_PRESNTE_PRE);
	delete from T_OEUVRE_OEU where oeu_code 
	not in (select distinct oeu_code from TJ_PRESNTE_PRE); 

	