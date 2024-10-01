package com.ecf.soignemoi

import android.app.Activity
import android.content.Context
import android.os.Bundle
import android.view.MenuItem
import android.view.Menu
import android.view.MenuInflater
import android.widget.PopupMenu
import android.widget.ImageButton
import android.content.Intent
import android.view.View
import android.widget.EditText
import android.widget.Toast


class MainActivity : Activity() {
    public override fun onCreate(s: Bundle?) {
        super.onCreate(s)
        setContentView(R.layout.activity_main)
        findViewById<ImageButton>(R.id.dropdown_menu).setOnClickListener {
            val intent = Intent(this, Connexion::class.java).setAction(Intent.ACTION_VIEW)
            PopupMenu(this, it).apply {
                // MainActivity implements OnMenuItemClickListener.
                setOnMenuItemClickListener(PopupMenu.OnMenuItemClickListener{
                    item -> when (item.itemId) {
                            R.id.item1 -> {
                                startActivity(intent)
                                true
                            }
                            R.id.item2 -> {
                                startActivity(intent)
                                true
                            }
                            else -> false
                        }
                    }
                    )
                inflate(R.menu.soignemoi_menu)
                show()
            }
        }
    }


    // Code pour créer un Menu d'options

    override fun onCreateOptionsMenu(menu: Menu): Boolean { // On définit et implémente la barre de menu contextuel flottant, avec des items
// à partir de la couche du Java API Framework (nommée View System)
        val inflater: MenuInflater = menuInflater
        inflater.inflate(R.menu.soignemoi_menu, menu) // soignemoi_menu.xml
        return true // une instruction vraie qui superpose uniquement la barre à la vue
    }

    // Code pour gérer les événements de clics

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        val intent = Intent(this, Connexion::class.java).setAction(Intent.ACTION_VIEW)
        // Handle item selection.
        return when (item.itemId) { // L'itemId universel permet d'identifier un objet item
            R.id.item1 -> {
                startActivity(intent)
                //newGame()
                true // une instruction vraie qui itère simplement sur autre chose activement que sur la vue
            }

            R.id.item2 -> {
                //showHelp()
                true // "________________________________________(idem)______________________________________"
            }

            else -> super.onOptionsItemSelected(item) // une instruction vraie qui itère simplement (cas true/false) sur une vue
// soit on a pas séléctionner d'éléments, soit on se trouve en dehors du menu où se produit une autre vue
        }
    }

    public override fun onStart() {
        super.onStart()
        }}