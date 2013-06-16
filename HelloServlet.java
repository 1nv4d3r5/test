import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class HelloServlet extends HttpServlet{
	public void doGet(HttpServletRequest newRequest, HttpServletResponse newResponse)
	throws IOException,ServletException
	{
			PrintWriter out = newResponse.getWriter();
			
			newResponse.getContentType("text/html,charset=UTF-8");
			
			try{
				out.println("<!DOCTYPE HTML>");
				out.println("<html>");
				out.println("<head>")
				out.println("<title>Your page title goes here!"</title>)"
				out.println("</head>"); //End of head tags
				out.println("<body>");
				out.println("<h1>Hello world</h1>");
				out.println("<p>Your paragraph!!</p>");
				out.println("</body>");
				out.println("</html>");
				
			
			}
			finally{
				out.close();
			}
	}
}