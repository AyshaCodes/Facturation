cli pour créer un controller:php artisan make:controller LivreController -r(avec les 7 foncyions)
php artisan make:model Livre -m:create le model et la table automa..
suivi de php artisan migrate aprés avoir ajouté les colonnes pour créer la table
dans le controlller les fctions:
1-Afficher la liste des produits
index:$l=livre::all();
return view("livres/index",["livres"=>$l])
url:/livres,method :get
route :livres.index(nom de la ressource+nom de la function)
<!-- le vrb HTTP -->
<!-- get:affichage/display
post:store
put :update
delete :destroy -->
2-Afficher form de ccreation
create return view("livres/create")
url:livres/create,methde get
route :livre.create
store(request $request)
livre::create($request->all)
url:/livres,post
route:livres/store
