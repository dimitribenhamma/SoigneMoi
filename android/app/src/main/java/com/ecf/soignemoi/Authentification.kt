package com.ecf.soignemoi

import android.content.Context
import android.content.Intent
import android.os.Bundle
import android.widget.EditText
import android.view.View
import android.widget.Toast


class Authentification(context:Context) : MembresSQLite(context) {
    var ligne:Int=0
    val context:Context=context

         override fun onViewCreated(view:View, s:Bundle) {
             super.onViewCreated(view, s)
            // déclare l'édit text, que l'on chercher à partir de son id
            val userNom = view.findViewById<EditText>(R.id.userName)
            val motDePasse = view.findViewById<EditText>(R.id.mot_de_passe)

            // Récupérer le text présent dans l'edit text
            val valUserNom = userNom.text.toString()
            val valMotDePasse = motDePasse.text.toString()
            val membresSQLite = MembresSQLite(context) //?
            val cursor = membresSQLite.readableDatabase

             val c = cursor.rawQuery("select id from `medecin` where email = " + valUserNom + " and password = " + valMotDePasse + ";",  // PAS SUR
                 null)

                while (c.moveToNext()) {
                    ligne++}
                        if (ligne == 1) {
                            val connecte = Intent(context, Connexion::class.java).setAction(Intent.ACTION_VIEW)
                            connecte.putExtra("email", valUserNom)
                            connecte.putExtra("password", valMotDePasse)
                            context.startActivity(connecte)
                        }  // PAS SUR
                        else if (ligne == 0){
                             val reessayer = Intent(context, MainActivity::class.java).setAction(Intent.ACTION_VIEW)
                            reessayer.putExtra("email", valUserNom)
                            reessayer.putExtra("password", valMotDePasse)
                            context.startActivity(reessayer)
                        }  // PAS SUR
                        else "Erreurs"
                    }
                }