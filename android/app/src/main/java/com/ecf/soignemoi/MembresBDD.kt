package com.ecf.soignemoi

import android.content.ContentValues
import android.content.Context
import android.database.Cursor
import android.database.sqlite.SQLiteDatabase
import android.database.sqlite.*


class MembresBDD(context:Context) : MembresSQLite(context) {
    private var bDD: SQLiteDatabase? = null
    private var membresSQLite:MembresSQLite? = null

    init {
        // cn crée la BDD et sa table
        membresSQLite = MembresSQLite(context)
    }

    fun open() {
        // on ouvre la BDD en écriture
        if (bDD == null) bDD = membresSQLite?.getWritableDatabase()
    }

    @Override
    override fun close() {
        if (bDD != null) if (bDD!!.isOpen) bDD!!.close()
    }


    fun insererMembres(serveur:Membres): Long {
        val values = ContentValues()
        values.put(COL_ID,serveur.id)
        values.put(COL_NOM, serveur.nom)
        values.put(COL_PRENOM,serveur.prenom)
        values.put(COL_EMAIL,serveur.email)
        values.put(COL_PASSWORD,serveur.password)
        values.put(COL_SPECIALITE,serveur.specialite)

        return bDD!!.insert(TABLE_NAME, null, values)
    }

    fun modifierMembres(id: Int, serveur: Membres): Int {
        val values = ContentValues()
        values.put(COL_ID, serveur.id)
        values.put(COL_NOM, serveur.nom)
        values.put(COL_PRENOM,serveur.prenom)
        values.put(COL_EMAIL,serveur.email)
        values.put(COL_PASSWORD,serveur.password)
        values.put(COL_SPECIALITE,serveur.specialite)
        return bDD!!.update(
            TABLE_NAME,
            values,
            COL_ID + " = " + id,
            null
        )
    }

    fun supprimerMembres(id: Int): Int {
        return bDD!!.delete(TABLE_NAME, COL_ID + " = " + id, null)
    }

    fun getMembres(nom: String, serveur: Membres): Membres? {
        val c = bDD!!.query(
            TABLE_NAME,
            arrayOf<String>(
                COL_ID,
                COL_NOM,
                COL_PRENOM,
                COL_EMAIL,
                COL_PASSWORD,
                COL_SPECIALITE
            ),
            COL_NOM + " LIKE \"" + nom + "\"",
            null,
            null,
            null,
            null
        )
        return cursorToServeur(c, true, serveur)
    }



    fun getAll(serveur: Membres): List<Membres?> {
        val personnes = mutableListOf<Membres?>()
            val cursor = bDD!!.query(
                TABLE_NAME,
                arrayOf<String>(
                    COL_ID,
                    COL_NOM,
                    COL_PRENOM,
                    COL_EMAIL,
                    COL_PASSWORD,
                    COL_SPECIALITE,
                ),
                null,
                null,
                null,
                null,
                null
            )
            cursor.moveToFirst()
            while (!cursor.isAfterLast) {
                val personne = cursorToServeur(cursor, true, serveur)
                personnes.add(personne)
                cursor.moveToNext()
            }
            cursor.close()
            return personnes
        }

    // Cette méthode permet de convertir un cursor en un objet de type Serveur
     private fun cursorToServeur(c: Cursor, one: Boolean, serveur: Membres): Membres? {
     if (c.count == 0) return null
     if (one == true)
     {
     c.moveToFirst()
     serveur.id = c.getInt(NUM_COL_ID)
     serveur.nom = c.getString(NUM_COL_NOM)
     serveur.prenom = c.getString(NUM_COL_PRENOM)
     serveur.email = c.getString(NUM_COL_EMAIL)
     serveur.password = c.getString(NUM_COL_PASSWORD)
     serveur.specialite = c.getString(NUM_COL_SPECIALITE)
     }
     if (one == true) c.close()
     return serveur
      }
}