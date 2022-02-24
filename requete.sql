
-- //creer vue
create or replace view v_etudiant_ecolage as
select 
    e.id as id_etudiant,
    e.nom,
    e.prenom,
    e.adresse,
    e.sexe,
    e.age,
    e.image,
    ec.id as id_ecolage,
    ec.janvier,
    ec.fevrier,
    ec.mars,
    ec.avril,
    ec.mai
    from 
        paiements
            join 
                etudiants e on e.id = paiements.etudiant_id
                    join ecolages ec on ec.id = paiements.ecolage_id;