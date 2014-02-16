import static java.lang.System.out;
import java.sql.*;  
import java.util.ArrayList;
import java.util.List;

public class Validate{

	public static boolean checkUser(String username, String password,String type){
		boolean st = false;
                
                Connection conn = null;
                String url = "jdbc:mysql://localhost:3306/";
                String dbName = "clinic";
                String driver = "com.mysql.jdbc.Driver";
                String userName = "root"; 
                String pass = "";
                try {
                      Class.forName(driver);
                      conn = DriverManager.getConnection(url+dbName,userName,pass);
                      //conn=DriverManager.getConnection("jdbc:mysql://localhost:3306/clinic","root","");
                      
                    } catch (Exception e) {  
                    }
                String sql= null;
                if(type.equals("Doctor")){
                sql = "select * from DOCTORS where username='"+username+"' and password='"+password+"'";       
                }
                else if(type.equals("Patient")){
                sql = "select * from PATIENT where username='"+username+"' and password='"+password+"'";       
                }
                else if(type.equals("Admin")){
                sql = "select * from ADMIN where username='"+username+"' and password='"+password+"'";       
                }
                 Statement stmt=null;
                 try { 
                      stmt = conn.createStatement();
                      ResultSet rs = stmt.executeQuery(sql);
                 while(rs.next()) {
                         st = true; 
                    }          
                 }catch(Exception e) { }
                 
                 return st;   }}         
