import java.io.*;  
import java.sql.*;  
import javax.servlet.*;  
import javax.servlet.http.*;  
  
public class Welcome extends HttpServlet {  
	public void doPost(HttpServletRequest request, HttpServletResponse response)  
            throws ServletException, IOException { 
		response.setContentType("text/html;charset=UTF-8");
		PrintWriter out = response.getWriter();
		out.println("Welcome user");
	}
}