package lanzador_unique;
import java.sql.*;
/**
 *
 * @author Alberto
 */
public class Lanzador_unique {
    public static void main(String[] args) {
        String url = "jdbc:postgresql://localhost:5432/BDUNIQUE";
        
        try{
            Class.forName("org.postgresql.Driver");
            Connection con = DriverManager.getConnection(url,"postgres","123456");
            Statement stmt = con.createStatement();
            ResultSet rs;
            String query = "select * from schedule_insertar_diario_p()";
            rs = stmt.executeQuery(query);
            stmt.execute("END");
            stmt.close();
            con.close();
        }
        catch(Exception e){
            System.out.println(e.getMessage());
            e.printStackTrace();
        }
        
    }
    
}
