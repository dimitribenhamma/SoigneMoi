package com.ecf.soignemoi

import android.app.Activity
import android.net.ConnectivityManager
import android.net.Network
import android.net.NetworkCapabilities
import java.net.URL
import android.os.Bundle
import java.io.BufferedReader
import java.io.IOException
import java.io.InputStream
import java.io.InputStreamReader
import java.io.UnsupportedEncodingException
import java.net.HttpURLConnection


// mon activity intent dans une popup ne s'affiche pas android
class Connexion : Activity() {

// localhost depuis un émulateur 10.0.0.2
    // Sinon 

    public override fun onCreate(s: Bundle?) {
        super.onCreate(s)
        setContentView(R.layout.connexion)
        if (isNetworkAvailable()){ // Check la connexion Internet
        // fetch data
        downloadUrl("https://github.com/dimitribenhamma/SoigneMoi/blob/main/sql/membres.sql")
        Authentification(this)
        } else {
        // Afficher une erreur
    }
}

    // Vérifie la connexion internet
    private fun isNetworkAvailable():Boolean
    {
        val connectivityManager:ConnectivityManager = getSystemService(ConnectivityManager::class.java) as ConnectivityManager
        val nw:Network? = connectivityManager.getActiveNetwork()
        if (nw == null) return false
        val actNw:NetworkCapabilities? = connectivityManager.getNetworkCapabilities(nw)
        return ((actNw != null) && (actNw.hasTransport(NetworkCapabilities.TRANSPORT_WIFI)))
    }


    @Throws(IOException::class)
    private fun downloadUrl(myurl: String): String? {
        // Fonction qui renvoie la chaine de caractère d'un flux (fichier) à partir d'URL
        var inSt:InputStream? = null

        return try {
            val url = URL(myurl)

            // La connexion se réalise par un objet URL,
            // qui retourne ensuite un objet de type HttpURLConnection
            // via la fonction openConnection()
            val conn = url.openConnection() as HttpURLConnection
            // Paramètres de connexion
            conn.readTimeout = 10000
            conn.connectTimeout = 15000
            conn.requestMethod = "GET"
            conn.doInput = true
            // Lancement de la connexion paramétrée
            conn.connect()
            inSt = conn.inputStream
            // On peut éventuellement récupérer le code de réponse avec la fonction getResponseCode() de HttpURLConnection.
            // Avec :
            // response:Int = conn.getResponseCode()
            // Log.d(DEBUG_TAG, "The response is: " + response)

            // Renvoie la chaine de caractère préalablement convertie à partir du flux
            readIt(inSt)
        }
        // A la fin ou en cas d'erreur, on arrête
            finally {if (inSt != null)
                inSt.close()
            }
        }


    @Throws(IOException::class, UnsupportedEncodingException::class)
    fun readIt(stream: InputStream?): String {
        // Convertit InputStream en une chaine de caractères

        val builder = StringBuilder()
        val reader = BufferedReader(InputStreamReader(stream))
        var line: String
        while (reader.readLine().also { line = it } != null) {
            builder.append(line + "\n")
        }
        return builder.toString()
    }
}

