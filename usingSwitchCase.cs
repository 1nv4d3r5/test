using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Our_First_Application
{
    class Program
    {
        static void Main(string[] args)
        {
            //This is the same like
            string output, input, decision;
            output = "Type in what i should say!";

            #region "Random things and text blaaaa"
            //this
            //string output = "Im a String";

            //Tells the Computer to write "Hello World!" to the screen
            Console.WriteLine(output);
            //Reads User Input and waits for the User to complete the input with hitting RETURN
            //Console.ReadLine();

            //this thing reads the user input, converts it to a string and gives the value to our string "input"
            input = Convert.ToString(Console.ReadLine());
            // \n is for a new line. {0} is a placeholder, in this case for input
            // you do it like ("{0}, {1}", variable1, variable2)
            //we will talk about this later more in detail :)
            Console.WriteLine("\nYou said: {0}", input);
            #endregion

            #region "spoiler"
            //showing information to the user
            Console.WriteLine("\n\n1) Beep!\n2) Show the Text thing again\n\nPress any Key to Exit!\n");
            //converts user input to string and gives the value to "decision"
            decision = Convert.ToString(Console.ReadLine());
            //it looks at the value of decision
            switch (decision)
            {
                //if decision = 1, it will beep
                case "1":
                    Console.Beep();
                    //getting out of the case "1": thingy
                    break;
                //if decision = 2, it will show the text again like at the beginning
                case "2":
                    Console.WriteLine(output);
                    input = Convert.ToString(Console.ReadLine());
                    Console.WriteLine("\nYou said: {0}", input);
                    break;
                //if the input isnt specified, it will do that
                default:
                    //Tells the computer that everything turned well (no errors) and closes the program
                    System.Environment.Exit(0);
                    break;
            }
            Console.ReadLine();
            #endregion
        }
    }
}

## My attempt!

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace usingSwitchCase
{
    class Program
    {
        static void Main(string[] args)
        {

            #region "All the bullsh*ts go here"
            String output,input,decision;

            output = "What do you think I should say?";

            Console.WriteLine(output);

            input = Convert.ToString(Console.ReadLine());

            Console.WriteLine("You said {0}\n", input);

            #endregion

            #region "Switch Case program starts here"

            Console.WriteLine("What do you want to do? Please choose from the options given below : ");
            Console.WriteLine("\n\n1.Beep\n2.What you said before!\n");
 
            decision = Convert.ToString(Console.ReadLine());

            switch(decision)
            {
                case "1":
                    Console.Beep();
                    break;
                case "2":
                    Console.WriteLine(output);
                    input = Convert.ToString(Console.ReadLine());
                    Console.WriteLine("You said {0}",input);
                    break;

                default:
                    System.Environment.Exit(0);
                    break;

            }

            Console.ReadLine();

            #endregion

        }
    }
}


## Version 1.03

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace WTFProgram
{
    class Program
    {
        static void Main(string[] args)
        {
            String output, input, decision;

            output = "What do you think I should say?";

            Console.WriteLine(output);
           
            input = Convert.ToString(Console.ReadLine());

            Console.WriteLine("You said {0}", input);

            #region "Code for Switch Case statement"

            Console.WriteLine("Choose your option:\n");
            Console.WriteLine("\n\n1.Beep \n2.Repeat the question again?\n3.Give us your age,you motherfuckr");

            decision = Convert.ToString(Console.ReadLine());

            switch (decision)
            { 
                case "1":
                    Console.Beep();
                    break;
                case "2":
                    Console.WriteLine(output);
                    input = Convert.ToString(Console.ReadLine());
                    Console.WriteLine("You said {0}", input);
                    break;
                case "3":
                    Console.Write("What's your age,motherfukr?");
                    int age = Convert.ToInt32(Console.ReadLine());
                    if (0 <= age && age <= 10)
                        Console.WriteLine("Your still young to code,kid!");
                    if (10 < age && age <= 30)
                        Console.WriteLine("Good! You should learn to code!");
                    if (30 < age && age <= 100)
                        Console.WriteLine("WTF!! What'd you do learning to code?");
                    if (age > 100)
                        Console.WriteLine("100+?? Why are you even alive??");
                    break;
                default:
                    System.Environment.Exit(0);
                    break;
            }

            Console.ReadLine();


            #endregion



        }
    }
}


## Version 1.04

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace WTFProgram
{
    class Program
    {
        static void Main(string[] args)
        {
            String output, input, decision;

            output = "What do you think I should say?";

            Console.WriteLine(output);
           
            input = Convert.ToString(Console.ReadLine());

            Console.WriteLine("You said {0}", input);

            #region "Code for Switch Case statement"

            Console.WriteLine("Choose your option:\n");
            Console.WriteLine("\n\n1.Beep \n2.Repeat the question again?\n3.Give us your age,you motherfuckr");

            decision = Convert.ToString(Console.ReadLine());

            switch (decision)
            { 
                case "1":
                    Console.Beep();
                    break;
                case "2":
                    Console.WriteLine(output);
                    input = Convert.ToString(Console.ReadLine());
                    Console.WriteLine("You said {0}", input);
                    break;
                case "3":
                    Console.Write("What's your age,motherfukr?");
                    try
                    {
                        int age = Convert.ToInt32(Console.ReadLine());

                        if (0 <= age && age <= 10)
                            Console.WriteLine("Your still young to code,kid!");
                        if (10 < age && age <= 30)
                            Console.WriteLine("Good! You should learn to code!");
                        if (30 < age && age <= 100)
                            Console.WriteLine("WTF!! What'd you do learning to code?");
                        if (age > 100)
                            Console.WriteLine("100+?? Why are you even alive??");
                       
                    }
                    catch (Exception e) {
                        Console.WriteLine("\nYou typed in something wrong!!\n The error is "+e);
                    }

                    break;
                default:
                    System.Environment.Exit(0);
                    break;
            }

            Console.ReadLine();


            #endregion



        }
    }
}

