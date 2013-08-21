Module CheckNetwork
    Sub Main()
        If My.Computer.Network.IsAvailable = True Then
            System.Console.WriteLine("Your computer is connected to the Internet.")
        Else
            System.Console.WriteLine("Your computer is not connected to the Internet.")
        End If
        System.Console.ReadLine()
    End Sub

End Module
