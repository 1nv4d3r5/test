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

    Private Sub ToolStripMenuItem1_Click(sender As Object, e As EventArgs) Handles ToolStripMenuItem1.Click

    End Sub

    Private Sub AboutToolStripMenuItem1_Click(sender As Object, e As EventArgs) Handles AboutToolStripMenuItem1.Click
        Dim strMessage As String = "IDM Serial Key Finder " & Application.ProductVersion & " (64-bit)" & vbNewLine & "Written by: Suman Thapa" & vbNewLine & "https://www.facebook.com/1nv4d3r"
        MessageBox.Show(strMessage, "About IDM Serial Key Finder ")
    End Sub

    Private Sub PictureBox1_Click(sender As Object, e As EventArgs)

    End Sub
End Class
