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
        ' Dim changeValue As String

        Dim fName As Object = TextBox1.Text
        Dim lName As Object = TextBox2.Text
        Dim eMail As Object = TextBox3.Text
        Dim sErial As Object = TextBox4.Text




        'changeValue = My.Computer.Registry.SetValue _
        My.Computer.Registry.SetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "FName", fName)
        ' TextBox1.Text = changeValue

        'changeValue = My.Computer.Registry.SetValue _
        My.Computer.Registry.SetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "LName", lName)

        'TextBox2.Text = changeValue

        'changeValue = My.Computer.Registry.SetValue _
        My.Computer.Registry.SetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Email", eMail)

        'TextBox3.Text = changeValue

        'changeValue = My.Computer.Registry.SetValue _
        My.Computer.Registry.SetValue _
                        ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Serial", sErial)

        'TextBox4.Text = changeValue

    End Sub
End Class
