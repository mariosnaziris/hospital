import java.io.*;  
import java.sql.*;  
import javax.servlet.*;  
import javax.servlet.http.*;  
  
public class Login extends HttpServlet {  
	public void doPost(HttpServletRequest request, HttpServletResponse response)  
            throws ServletException, IOException { 
		response.setContentType("text/html;charset=UTF-8");
		PrintWriter out = response.getWriter();
		
		String user = request.getParameter("username");  
		String pass = request.getParameter("password");
                String type = request.getParameter("type");
				
		if(Validate.checkUser(user, pass,type)){
			RequestDispatcher rs = request.getRequestDispatcher("Welcome.jsp");
			rs.forward(request, response);
			
		}else{
			out.println("Username or Password incorrect");
                        out.println(user + pass);
			RequestDispatcher rs = request.getRequestDispatcher("index.jsp");
			rs.include(request, response);
			}
	}
}