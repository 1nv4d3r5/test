// To save as "<CATALINA_HOME>\webapps\helloservlet\WEB-INF\src\mypkg\EchoServlet.java"
package mypkg;
 
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.util.*;
 
public class EchoServlet extends HttpServlet {
 
   @Override
   public void doGet(HttpServletRequest request, HttpServletResponse response)
               throws IOException, ServletException {
      // Set the response message's MIME type
      response.setContentType("text/html; charset=UTF-8");
      // Allocate a output writer to write the response message into the network socket
      PrintWriter out = response.getWriter();
 
      // Write the response message, in an HTML page
      try {
         out.println("<!DOCTYPE html>");
         out.println("<html><head>");
         out.println("<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>");
         out.println("<title>Echo Servlet</title></head>");
         out.println("<body><h2>You have enter</h2>");
 
         // Retrieve the value of the query parameter "username" (from text field)
         String username = request.getParameter("username");
         // Get null if the parameter is missing from query string.
         // Get empty string or string of white spaces if user did not fill in
         if (username == null
               || (username = htmlFilter(username.trim())).length() == 0) {
            out.println("<p>Name: MISSING</p>");
         } else {
            out.println("<p>Name: " + username + "</p>");
         }
 
         // Retrieve the value of the query parameter "password" (from password field)
         String password = request.getParameter("password");
         if (password == null
               || (password = htmlFilter(password.trim())).length() == 0) {
            out.println("<p>Password: MISSING</p>");
         } else {
            out.println("<p>Password: " + password + "</p>");
         }
 
         // Retrieve the value of the query parameter "gender" (from radio button)
         String gender = request.getParameter("gender");
         // Get null if the parameter is missing from query string.
         if (gender == null) {
            out.println("<p>Gender: MISSING</p>");
         } else if (gender.equals("m")) {
            out.println("<p>Gender: male</p>");
         } else {
            out.println("<p>Gender: female</p>");
         }
 
         // Retrieve the value of the query parameter "age" (from pull-down menu)
         String age = request.getParameter("age");
         if (age == null) {
            out.println("<p>Age: MISSING</p>");
         } else if (age.equals("1")) {
            out.println("<p>Age: &lt; 1 year old</p>");
         } else if (age.equals("99")) {
            out.println("<p>Age: 1 to 99 years old</p>");
         } else {
            out.println("<p>Age: &gt; 99 years old</p>");
         }
 
         // Retrieve the value of the query parameter "language" (from checkboxes).
         // Multiple entries possible.
         // Use getParameterValues() which returns an array of String.
         String[] languages = request.getParameterValues("language");
         // Get null if the parameter is missing from query string.
         if (languages == null || languages.length == 0) {
            out.println("<p>Languages: NONE</p>");
         } else {
            out.println("<p>Languages: ");
            for (String language : languages) {
               if (language.equals("c")) {
                  out.println("C/C++ ");
               } else if (language.equals("cs")) {
                  out.println("C# ");
               } else if (language.equals("java")) {
                  out.println("Java ");
               }
            }
            out.println("</p>");
         }
 
         // Retrieve the value of the query parameter "instruction" (from text area)
         String instruction = request.getParameter("instruction");
         // Get null if the parameter is missing from query string.
         if (instruction == null
              || (instruction = htmlFilter(instruction.trim())).length() == 0
              || instruction.equals("Enter your instruction here...")) {
            out.println("<p>Instruction: NONE</p>");
         } else {
            out.println("<p>Instruction: " + instruction + "</p>");
         }
 
         // Retrieve the value of the query parameter "secret" (from hidden field)
         String secret = request.getParameter("secret");
         out.println("<p>Secret: " + secret + "</p>");
 
         // Get all the names of request parameters
         Enumeration names = request.getParameterNames();
         out.println("<p>Request Parameter Names are: ");
         if (names.hasMoreElements()) {
            out.print(htmlFilter(names.nextElement().toString()));
         }
         do {
            out.print(", " + htmlFilter(names.nextElement().toString()));
         } while (names.hasMoreElements());
         out.println(".</p>");
 
         // Hyperlink "BACK" to input page
         out.println("<a href='form_input.html'>BACK</a>");
 
         out.println("</body></html>");
      } finally {
         out.close();  // Always close the output writer
      }
   }
 
   // Redirect POST request to GET request.
   @Override
   public void doPost(HttpServletRequest request, HttpServletResponse response)
               throws IOException, ServletException {
      doGet(request, response);
   }
 
   // Filter the string for special HTML characters to prevent
   // command injection attack
   private static String htmlFilter(String message) {
      if (message == null) return null;
      int len = message.length();
      StringBuffer result = new StringBuffer(len + 20);
      char aChar;
 
      for (int i = 0; i < len; ++i) {
         aChar = message.charAt(i);
         switch (aChar) {
             case '<': result.append("&lt;"); break;
             case '>': result.append("&gt;"); break;
             case '&': result.append("&amp;"); break;
             case '"': result.append("&quot;"); break;
             default: result.append(aChar);
         }
      }
      return (result.toString());
   }
}