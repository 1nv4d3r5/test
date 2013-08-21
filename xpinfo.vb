Public Class Form1


    Private Sub Form1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Dim readValue As String
        readValue = My.Computer.Registry.GetValue _
        ("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion", "CSDVersion", Nothing)
        TextBox1.Text = readValue
        readValue = My.Computer.Registry.GetValue _
        ("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion", "buildlab", Nothing)
        TextBox2.Text = readValue
        readValue = My.Computer.Registry.GetValue _
        ("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion", "PathName", Nothing)
        TextBox3.Text = readValue
        readValue = My.Computer.Registry.GetValue _
        ("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion", "ProductId", Nothing)
        TextBox4.Text = readValue
    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        End
    End Sub

    Private Sub Label1_Click(sender As Object, e As EventArgs) Handles Label1.Click

    End Sub

    Private Sub TextBox1_TextChanged(sender As Object, e As EventArgs) Handles TextBox1.TextChanged

    End Sub
End Class



Public Class Form1

    Private Sub Label1_Click(sender As Object, e As EventArgs) Handles Label1.Click

    End Sub

    Private Sub TextBox1_TextChanged(sender As Object, e As EventArgs) Handles TextBox1.TextChanged

    End Sub

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

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        End
    End Sub
End Class
