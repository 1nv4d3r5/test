Public Class Form1

    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        Dim readValue As String

        readValue = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "FName", Nothing)
        TextBox1.Text = readValue

        readValue = My.Computer.Registry.GetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "LName", Nothing)
        TextBox2.Text = readValue

        readValue = My.Computer.Registry.GetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Email", Nothing)
        TextBox3.Text = readValue

        readValue = My.Computer.Registry.GetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Serial", Nothing)

        TextBox4.Text = readValue



    End Sub

    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        End
    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
   




        My.Computer.Registry.SetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "FName", TextBox1.Text)



        My.Computer.Registry.SetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "LName", TextBox2.Text)

       
        My.Computer.Registry.SetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Email", TextBox3.Text)



        My.Computer.Registry.SetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Serial", TextBox4.Text)



    End Sub
End Class
