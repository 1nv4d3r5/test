//This is the second page. It greets the user and provides a link to the first page.



import java.io.*;
import java.text.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;



public class MySession2 extends HttpServlet {

        public void doGet(HttpServletRequest request,
                      HttpServletResponse response)
        throws IOException, ServletException
    {
        response.setContentType("text/html");

	HttpSession session = request.getSession(true);
	
	if (session.getAttribute("userName") == null) {
	    session.setAttribute("userName", "Stranger");
	}

	PrintWriter out = response.getWriter();
	
        out.println("<html>");
        out.println("<body bgcolor=\"lightblue\">");
        out.println("<head>");

	out.println("<title> A session example </title>");
        out.println("</head>");
        out.println("<body>");


	out.println("<h1> A session example page 2</h1>");

	out.println("Welcome " + (String) session.getAttribute("userName") + "!");

	out.println("<P><A HREF = \"MySession1\">go to page 1</A>");

	out.println("</body>");
	out.println("</html>");


	out.close();

	
    }

}
