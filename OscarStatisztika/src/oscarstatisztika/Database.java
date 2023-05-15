
package oscarstatisztika;

/*
* Database.java
* Author: Gyüre Árpád
* Copyright: 2023, Gyüre Árpád
* Group: Szoft I-1-E
* Date: 2023-05-14
* Github: https://github.com/rp2022k/Oscar
* Licenc: GNU GPL
*/

import java.io.*;
import java.sql.*;

public class Database {
    
    String url;
    String database;
    String user;
    String password;
    String kapcsolat;

    public Database(String url, String database, String user, String password, String kapcsolat) {
        this.url = url;
        this.database = database;
        this.user = user;
        this.password = password;
        this.kapcsolat = kapcsolat;
    }

    public void statisztika(int listaNum, String[][] stat) throws IOException {
        
        
        try {    
            Class.forName("com.mysql.cj.jdbc.Driver");
        } catch (ClassNotFoundException ex) {
            System.out.println("Baj van! Nem találom a driver-t!"+ ex);
        }
        if (this.kapcsolat !=null)
        {
            System.out.println("Sikeresen kapcsolódtunk az adatbázishoz \n");
        }
        
        try { 
            
            String[][] sql = {
                {"1", "SELECT cim, dij FROM oscar.filmek ORDER BY jelol DESC, cim;"},
                {"2", "SELECT cim, dij, jelol FROM filmek WHERE (ev > 1950) AND (dij >= 3) ORDER BY cim;"},
                {"3", "SELECT cim, ev FROM filmek ORDER BY jelol DESC limit 5;"},
                {"4", "SELECT cim, dij FROM filmek WHERE (ev > 2000) AND (dij >= (SELECT dij FROM filmek WHERE ev > 2000 ORDER BY dij DESC limit 4,1)) ORDER by dij DESC;"},
                {"5", "SELECT cim, jelol, dij FROM filmek WHERE cim LIKE \"%King%\" ORDER BY jelol DESC, dij DESC;"},
                {"6", "SELECT * FROM filmek WHERE jelol = dij ORDER BY ev, cim;"},
                {"7", "SELECT cim, ev FROM filmek WHERE (ev > 1938 AND ev < 1946) AND (dij >2) ORDER BY ev, cim;"},
                {"8", "SELECT * FROM filmek WHERE (ev = 1976 OR ev = 1952) AND dij >= 4 ORDER BY cim;"},
                {"9", "SELECT cim FROM filmek WHERE cim LIKE \"The%\" ORDER BY cim;"},
                {"10", "SELECT * FROM filmek WHERE (ev > 1960) AND (dij = jelol) ORDER BY jelol DESC, ev DESC;"}
            };
            
            Connection con = DriverManager.getConnection(url+database, user, password);
            Statement stm = con.createStatement();

            ResultSet resultSet = stm.executeQuery(sql[listaNum-1][1]);
            ResultSetMetaData rsmd = resultSet.getMetaData();
            int columnsNumber = rsmd.getColumnCount();
            
            System.out.println("A kért statisztika:\n");
            for (int i = 1; i <= 3; i++){
                System.out.println(stat[listaNum-1][i]);
            }
            
            while (resultSet.next()) {
                for (int i = 1; i <= columnsNumber; i++) {
                    String columnValue = resultSet.getString(i);
                    if (i == 2)
                        System.out.printf("%-50s",columnValue);
                    else System.out.printf("%-20s",columnValue);
                }
                System.out.println("");
            }
            
            
        } catch (SQLException ex) {
            System.out.println("Baj van! Hiba az adatbázis csatlakozásban!"+ ex);
        }
    }
    
    
}
