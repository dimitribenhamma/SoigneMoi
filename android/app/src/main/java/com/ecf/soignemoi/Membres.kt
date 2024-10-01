package com.ecf.soignemoi
// on crée cette classe seulement pour insérer et modifier des données dans la table

class Membres(id: Int, nom: String, prenom: String, email: String, password: String, specialite: String) {
    var id:Int = id
        get() = field
        set(value)
        {
            field = value
        }
    var nom: String = nom
        set(value)
        {
            field = value
        }
    var prenom: String = prenom
        set(value)
        {
            field = value
        }
    var email: String = email
        set(value)
        {
            field = value
        }
    var password: String = password
        set(value)
        {
            field = value
        }
    var specialite: String = specialite
        set(value)
        {
            field = value
        }


    override fun toString(): String {
        return "id : $id\n" +
                "nom : $nom\n" +
                "prenom : $prenom\n" +
                "password : $password\n" +
                "email : $email\n" +
                "specialité : $specialite\n"
    }
}