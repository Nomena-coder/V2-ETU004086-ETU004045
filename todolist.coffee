
index.php -> entrer dans pages/index
data : creation de table et view 
         Views: - objet + membre
                     - categorie + objet
                     - emprunt + objet
Modal : modele et pour aller a tte les pages 

Inc : 
      - connect -> connect 
      -  function: 
                          -getLoginInfo(nom, mail, mdp)
                          -getCategories()
                          -getList(idCategorie)
                          -isOnEmprunt(idobjet)
                          - function de qddObject rehetra
                          - function de fiche rehetra

Pages:
      -index : Login( entrer email et mdp)
      -traitement login ( verification de email et mdp ) 
      -list (card des objets avec categories et membre ainsi qu'emprunt, show categories de tout )
      -traitement create : insert into si tsy ao ilay izy sinon insert into 
      -fiche

Assets: 
        - bootstrap