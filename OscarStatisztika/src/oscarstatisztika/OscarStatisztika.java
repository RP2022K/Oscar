
package oscarstatisztika;

/*
* OscarStatisztika.java
* Author: Gyüre Árpád
* Copyright: 2023, Gyüre Árpád
* Group: Szoft I-1-E
* Date: 2023-05-14
* Github: https://github.com/rp2022k/Oscar
* Licenc: GNU GPL
*/

import java.io.FileDescriptor;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.PrintStream;
import java.io.UnsupportedEncodingException;
import java .util.*;

public class OscarStatisztika {
        
    
    public static void main(String[] args) throws IOException{
        
        try {
            System.setOut(new PrintStream(new FileOutputStream(FileDescriptor.out), true, "UTF-8"));
            } catch (UnsupportedEncodingException e) {
                throw new InternalError("VM does not support mandatory encoding UTF-8");
        }

        Scanner sc = new Scanner(System.in);
        System.out.print("Melyik listát szeretné (1-10):  ");

        int listaNum = Integer.parseInt(sc.nextLine());
        
        String[][] stat =   {
            {"1",
             "Lista az összes filmről a címük és elnyert díjaik számának feltüntetésével,",
             "rendezve a jelölések száma szerint csökkenő rendbe, ezen belül cím szerint névsorba",
             ""},
            {"2",
             "Lista az 1950 után legalább 3 Oscar-díjjal jutalmazott filmek címével, a díjak és jelölések számával",
             "A lista rendezve a filmek címe szerint névsorba",
             ""},
            {"3",
             "Lista az 5 legtöbb jelölést kapott film címéről és a díjazás évéről",
             "",
             ""},
            {"4",
             "Lista a 2000 után 5 legtöbb díjat kapott film címéről és a díjak számáról!",
             "Kezelve az esetleges holtverseny!",
             ""},
            {"5",
             "Lista az összes olyan filmről, amely címében szerepel a King szó vagy szórészlet",
             "Megjelenítve a film címe, a jelölések és az elnyert díjak száma",
             "Rendezve a jelölések, ezen belül a díjak száma szerint csökkenő sorrendbe"},
            {"6",
             "Lista azoknak a filmeknek minden adatárül, amelyek minden jelölést megnyertek!",
             "A lista rendezve év szerint, ezen belül cím szerint növekvő sorrendbe",
             ""},
            {"7",
             "Lista a II. világháború alatt legalább 3 Oscar-díjat kapott filmek címéről és a díjazás évéről",
             "A lista rendezve a díjazás éve, ezen belül a film címe szerint növekvő sorrendbe",
             ""},
            {"8",
             "Lista azokról a filmekről, amelyek az Ön vagy édesanyja születési évében kaptak több,",
             "mint 4 jelölést. Megjelenítve a filmek címe névsorban. Kezelve az esetleges holtverseny!",
             ""},
            {"9",
             "Listát azokról a filmcímekről, melyek a The szóval kezdődnek. Rendezve névsor szerint",
             "",
             ""},
            {"10",
             "Lista azoknak a filmekneknek minden adatáról, melyek 1960 után készültek és minden",
             "jelölést megnyertek. Rendezve a jelölés és ev szerint csökkenő sorrendbe",
             ""},
        };
    
        
        
        String url = "jdbc:mysql://127.0.0.1:3306/";
        String dbName = "oscar";
        String user = "root";
        String password = "";
        String kapcsolat = "";
        
        Database db = new Database(url, dbName, user, password, kapcsolat);
        
        db.statisztika(listaNum, stat);
    }
    
}
