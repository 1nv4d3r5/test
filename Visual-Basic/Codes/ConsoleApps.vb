

Program that uses char arrays: VB.NET
Module Module1
    Sub Main()
	' Use the quick syntax.
	Dim array1() As Char = {"s", "a", "m"}

	' Use the long syntax.
	Dim array2(2) As Char
	array2(0) = "s"
	array2(1) = "a"
	array2(2) = "m"

	' Another syntax.
	Dim array3() As Char = New Char() {"s", "a", "m"}

	' Display lengths.
	Console.WriteLine(array1.Length)
	Console.WriteLine(array2.Length)
	Console.WriteLine(array3.Length)
    End Sub
End Module



Program that uses Inherits keyword: VB.NET

Class A
    Public _value As Integer

    Public Sub Display()
	Console.WriteLine(_value)
    End Sub
End Class



class And object

Module mybox
   Class Box
      Public length As Double   ' Length of a box
      Public breadth As Double   ' Breadth of a box
      Public height As Double    ' Height of a box
   End Class
   Sub Main()
      Dim Box1 As Box = New Box()        ' Declare Box1 of type Box
      Dim Box2 As Box = New Box()        ' Declare Box2 of type Box
      Dim volume As Double = 0.0     ' Store the volume of a box here
      ' box 1 specification
      Box1.height = 5.0
      Box1.length = 6.0
      Box1.breadth = 7.0
       ' box 2 specification
      Box2.height = 10.0
      Box2.length = 12.0	
      Box2.breadth = 13.0
      'volume of box 1
      volume = Box1.height * Box1.length * Box1.breadth
      Console.WriteLine("Volume of Box1 : {0}", volume)
      'volume of box 2
      volume = Box2.height * Box2.length * Box2.breadth
      Console.WriteLine("Volume of Box2 : {0}", volume)
      Console.ReadKey()
   End Sub
End Module


Member Functions and Encapsulation

Module mybox
   Class Box
      Public length As Double   ' Length of a box
      Public breadth As Double   ' Breadth of a box
      Public height As Double    ' Height of a box
      Public Sub setLength(ByVal len As Double)
          length = len
      End Sub
      Public Sub setBreadth(ByVal bre As Double)
          breadth = bre
      End Sub
      Public Sub setHeight(ByVal hei As Double)
          height = hei
      End Sub
      Public Function getVolume() As Double
          Return length * breadth * height
      End Function
   End Class
   Sub Main()
      Dim Box1 As Box = New Box()        ' Declare Box1 of type Box
      Dim Box2 As Box = New Box()        ' Declare Box2 of type Box
      Dim volume As Double = 0.0     ' Store the volume of a box here

     ' box 1 specification
      Box1.setLength(6.0)
      Box1.setBreadth(7.0)
      Box1.setHeight(5.0)
      
      'box 2 specification
      Box2.setLength(12.0)
      Box2.setBreadth(13.0)
      Box2.setHeight(10.0)
      
      ' volume of box 1
      volume = Box1.getVolume()
      Console.WriteLine("Volume of Box1 : {0}", volume)

      'volume of box 2
      volume = Box2.getVolume()
      Console.WriteLine("Volume of Box2 : {0}", volume)
      Console.ReadKey()
   End Sub
End Module

Constructors and Destructors


Class Line
   Private length As Double    ' Length of a line
   Public Sub New()   'constructor
      Console.WriteLine("Object is being created")
   End Sub
   Public Sub setLength(ByVal len As Double)
      length = len
   End Sub
     
   Public Function getLength() As Double
      Return length
   End Function
   Shared Sub Main()
      Dim line As Line = New Line()
      'set line length
      line.setLength(6.0)
      Console.WriteLine("Length of line : {0}", line.getLength())
      Console.ReadKey()
   End Sub
End Class


Class B : Inherits A
    Public Sub New(ByVal value As Integer)
	MyBase._value = value
    End Sub
End Class

Class C : Inherits A
    Public Sub New(ByVal value As Integer)
	MyBase._value = value * 2
    End Sub
End Class

Module Module1
    Sub Main()
	Dim b As B = New B(5)
	b.Display()

	Dim c As C = New C(5)
	c.Display()
    End Sub
End Module

Output

5
10

Program that uses MyClass: VB.NET

Class Perl
    Private _name As String

    Public Sub New(ByVal name As String)
	MyClass._name = name

	Console.WriteLine(MyClass._name)
	Console.WriteLine(name)
	Console.WriteLine(_name)
    End Sub
End Class

Module Module1
    Sub Main()
	Dim p As Perl = New Perl("Sam")
    End Sub
End Module

out put

Sam
Sam
Sam


Program that uses Is, IsNot operators: VB.NET

Module Module1
    Sub Main()
	Dim value As String = "cat"

	' Check if it is NOT Nothing.
	If value IsNot Nothing Then
	    Console.WriteLine(1)
	End If

	' Change to Nothing.
	value = Nothing

	' Check if it IS Nothing.
	If value Is Nothing Then
	    Console.WriteLine(2)
	End If

	' This isn't reached.
	If value IsNot Nothing Then
	    Console.WriteLine(3)
	End If
    End Sub
End Module

Output

1
2


Program that uses For: VB.NET

Module Module1
    Sub Main()
	' This loop goes from 0 to 5.
	For value As Integer = 0 To 5
	    ' Exit condition if the value is three.
	    If (value = 3) Then
		Exit For
	    End If
	    Console.WriteLine(value)
	Next
    End Sub
End Module

Output

0
1
2


Program that uses For Each loop: VB.NET

Module Module1
    Sub Main()
	' The input array.
	Dim ferns() As String = {"Psilotopsida", _
				 "Equisetopsida", _
				 "Marattiopsida", _
				 "Polypodiopsida"}
	' Loop over each element with For Each.
	For Each fern As String In ferns
	    Console.WriteLine(fern)
	Next
    End Sub
End Module

Output

Psilotopsida
Equisetopsida
Marattiopsida
Polypodiopsida

Program that uses VarType function: VB.NET

Module Module1
    Sub Main()
	' Integer.
	Dim value As Integer = 5

	' Get VarType.
	Dim type As VariantType = VarType(value)

	' Write string representation.
	Console.WriteLine(type.ToString())

	' Show GetType method.
	Console.WriteLine(value.GetType().ToString())

	' You can check the VariantType against constants.
	If type = VariantType.Integer Then
	    Console.WriteLine("It's an integer!")
	End If
    End Sub
End Module

Output

Integer
System.Int32
It's an integer!


Program that loops over strings: VB.NET

Module Module1
    Sub Main()
	' Input string.
	Dim input As String = "perls"

	Console.WriteLine("-- For Each --")

	' Use For Each loop on string.
	For Each element As Char In input
	    Console.WriteLine(element)
	Next

	Console.WriteLine("-- For --")

	' Use For loop on string.
	For i As Integer = 0 To input.Length - 1
	    Dim c As Char = input(i)
	    Console.WriteLine(c)
	Next

	Console.ReadLine()
    End Sub
End Module

Output

-- For Each --
p
e
r
l
s
-- For --
p
e
r
l
s


Program that uses Do Until: VB.NET


Module Module1
    Sub Main()
	Dim i As Integer = 0

	' Example Do Until loop.
	Do Until i = 10
	    Console.WriteLine("Do Until: {0}", i)
	    i += 1
	Loop

	Console.WriteLine()

	i = 0

	' Equivalent Do While loop.
	Do While i < 10
	    Console.WriteLine("Do While: {0}", i)
	    i += 1
	Loop
    End Sub
End Module

Output

Do Until: 0
Do Until: 1
Do Until: 2
Do Until: 3
Do Until: 4
Do Until: 5
Do Until: 6
Do Until: 7
Do Until: 8
Do Until: 9

Do While: 0
Do While: 1
Do While: 2
Do While: 3
Do While: 4
Do While: 5
Do While: 6
Do While: 7
Do While: 8
Do While: 9

Program that uses System.Array.Sort on strings: VB.NET

Module Module1
    Sub Main()
	' Create an array of String() with five elements.
	Dim array As String() = New String() {"Egyptian", _
	    "Indian", _
	    "American", _
	    "Chinese", _
	    "Filipino"}
	' Use the System.Array.Sort shared method.
	System.Array.Sort(Of String)(array)
	' Loop through the results.
	Dim value As String
	For Each value In array
	    Console.WriteLine(value)
	Next
    End Sub
End Module

Output

American
Chinese
Egyptian
Filipino
Indian



Program that uses Sort and Reverse methods: VB.NET

Module Module1
    Sub Main()
	' Create an array of String() with five elements.
	Dim array As String() = New String() {"X", _
	    "B", _
	    "A", _
	    "Z", _
	    "C"}
	' Use the System.Array.Sort shared method.
	System.Array.Sort(Of String)(array)
	' Invoke the Reverse method after sorting.
	System.Array.Reverse(array)
	' Loop through the results.
	Dim value As String
	For Each value In array
	    Console.WriteLine(value)
	Next
    End Sub
End Module

Output

Z
X
C
B
A

Program that uses List Sort method: VB.NET

Module Module1
    Sub Main()
	' Create a list of strings.
	Dim list As New List(Of String)
	list.Add("Australian")
	list.Add("Mongolian")
	list.Add("Russian")
	list.Add("Austrian")
	list.Add("Brazilian")
	' Use Sort method.
	list.Sort()
	' Loop through the results.
	Dim value As String
	For Each value In list
	    Console.WriteLine(value)
	Next
    End Sub
End Module

Output

Australian
Austrian
Brazilian
Mongolian
Russian

Member Functions and Encapsulation

Module mybox
   Class Box
      Public length As Double   ' Length of a box
      Public breadth As Double   ' Breadth of a box
      Public height As Double    ' Height of a box
      Public Sub setLength(ByVal len As Double)
          length = len
      End Sub
      Public Sub setBreadth(ByVal bre As Double)
          breadth = bre
      End Sub
      Public Sub setHeight(ByVal hei As Double)
          height = hei
      End Sub
      Public Function getVolume() As Double
          Return length * breadth * height
      End Function
   End Class
   Sub Main()
      Dim Box1 As Box = New Box()        ' Declare Box1 of type Box
      Dim Box2 As Box = New Box()        ' Declare Box2 of type Box
      Dim volume As Double = 0.0     ' Store the volume of a box here

     ' box 1 specification
      Box1.setLength(6.0)
      Box1.setBreadth(7.0)
      Box1.setHeight(5.0)
      
      'box 2 specification
      Box2.setLength(12.0)
      Box2.setBreadth(13.0)
      Box2.setHeight(10.0)
      
      ' volume of box 1
      volume = Box1.getVolume()
      Console.WriteLine("Volume of Box1 : {0}", volume)

      'volume of box 2
      volume = Box2.getVolume()
      Console.WriteLine("Volume of Box2 : {0}", volume)
      Console.ReadKey()
   End Sub
End Module

out-put

Volume of Box1 : 210
Volume of Box2 : 1560

Inheritance

Class Shape
   Protected width As Integer
   Protected height As Integer
   Public Sub setWidth(ByVal w As Integer)
      width = w
   End Sub
   Public Sub setHeight(ByVal h As Integer)
      height = h
   End Sub
End Class
' Derived class
Class Rectangle : Inherits Shape
   Public Function getArea() As Integer
      Return (width * height)
   End Function
End Class
Class RectangleTester
   Shared Sub Main()
      Dim rect As Rectangle = New Rectangle()
      rect.setWidth(5)
      rect.setHeight(7)
      ' Print the area of the object.
      Console.WriteLine("Total area: {0}", rect.getArea())
      Console.ReadKey()
   End Sub	
End Class



Handling Exceptions

Module exceptionProg
   Sub division(ByVal num1 As Integer, ByVal num2 As Integer)
      Dim result As Integer
      Try
          result = num1 \ num2
      Catch e As DivideByZeroException
          Console.WriteLine("Exception caught: {0}", e)
      Finally
          Console.WriteLine("Result: {0}", result)
      End Try
   End Sub
   Sub Main()
      division(25, 0)
      Console.ReadKey()
  End Sub
End Module


Using Select Case in VB.net


Module Module1
    Sub Main()
        Dim intInput As Integer
        System.Console.WriteLine("Enter an integer�")
        intInput = Val(System.Console.ReadLine())
        Select Case intInput
            Case 1
                System.Console.WriteLine("Thank you.")
            Case 2
                System.Console.WriteLine("That's fine.")
            Case 3
                System.Console.WriteLine("OK.")
            Case 4 To 7
                System.Console.WriteLine("In the range 4 to 7.")
            Case Is > 7
                System.Console.WriteLine("Definitely too big.")
            Case Else
                System.Console.WriteLine("Not a number I know.")
        End Select
    End Sub
End Module



