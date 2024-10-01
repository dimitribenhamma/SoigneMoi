package com.ecf.soignemoi

import android.database.sqlite.*
import android.content.Context
import android.os.Bundle
import android.view.View


open class MembresSQLite(context: Context?) : SQLiteOpenHelper(context,"Membres",null,1)
{
    protected val DATABASE_NAME:String = "Membres"
    protected val DATABASE_VERSION:Int = 1
    protected val TABLE_NAME:String = "medecin"
    protected val COL_ID = "id"
    protected val COL_NOM = "nom"
    protected val COL_PRENOM = "prenom"
    protected val COL_EMAIL = "email"
    protected val COL_PASSWORD = "password"
    protected val COL_SPECIALITE = "specialite"
    protected val NUM_COL_ID:Int = 0
    protected val NUM_COL_NOM:Int = 1
    protected val NUM_COL_PRENOM:Int = 2
    protected val NUM_COL_EMAIL:Int = 3
    protected val NUM_COL_PASSWORD:Int = 4
    protected val NUM_COL_SPECIALITE:Int = 5


    private val CREATE_BDD:String = "CREATE TABLE " + TABLE_NAME + " (" +
            COL_ID + " INTEGER PRIMARY KEY, " +
            COL_NOM + " VARCHAR(5) TEXT, " +
            COL_PRENOM + " VARCHAR(25) TEXT, " +
            COL_EMAIL + " VARCHAR(10), " +
            COL_PASSWORD + " VARCHAR(15), " +
            COL_EMAIL + " VARCHAR(25) TEXT)" +
            COL_SPECIALITE + " VARCHAR(25) TEXT);"


    @Override
    override fun onCreate(db:SQLiteDatabase)
    {
        // on crée la table
        db.execSQL(CREATE_BDD);
    }

    @Override
    override fun onUpgrade(db:SQLiteDatabase, oldVersion:Int, newVersion:Int)
    {
        // au choix : on supprime la table puis on la recréé
        db.execSQL("DROP TABLE " + TABLE_NAME + ";");
        onCreate(db);
    }

    override fun onDowngrade(db: SQLiteDatabase, oldVersion: Int, newVersion: Int) {
        onUpgrade(db, oldVersion, newVersion)
    }

    open fun onViewCreated(view: View, s: Bundle) {
    }

}