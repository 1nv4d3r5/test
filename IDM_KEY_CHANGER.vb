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

    Private Sub ImportToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles ImportToolStripMenuItem.Click
        ' SaveFileDialog1.ShowDialog()
        ' If SaveFileDialog1.FileName <> "" Then
        'FileOpen(1, SaveFileDialog1.FileName, OpenMode.Output)
        'PrintLine(2, TextBox1.Text)
        'FileClose(1)

        Dim getValue1 As String
        Dim getValue2 As String
        Dim getValue3 As String
        Dim getValue4 As String
        Dim getValue5 As String
        Dim getValue6 As String

        getValue1 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "AdvIntDriverEnabled2", Nothing)

        getValue2 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "FName", Nothing)

        getValue3 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "LName", Nothing)

        getValue4 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Email", Nothing)

        getValue5 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Serial", Nothing)

        getValue6 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "InstallStatus", Nothing)

        With SaveFileDialog1
            SaveFileDialog1.Filter = "Registration Files (*.reg)|*.reg|Text Files (*.text)|*.txt|All Files|*.*"

            If .ShowDialog = DialogResult.OK Then
                FileOpen(1, SaveFileDialog1.FileName, OpenMode.Output)
                PrintLine(1, "Windows Registry Editor Version 5.00")
                PrintLine(1, " ")
                PrintLine(1, "[HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager]")
                PrintLine(1, """AdvIntDriverEnabled2""" & "=dword:0000000" & getValue1)
                PrintLine(1, """FName""" & "=" & """" & getValue2 & """")
                PrintLine(1, """LName""" & "=" & """" & getValue3 & """")
                PrintLine(1, """Email""" & "=" & """" & getValue4 & """")
                PrintLine(1, """Serial""" & "=" & """" & getValue5 & """")
                PrintLine(1, """InstallStatus""" & "=dword:0000000" & getValue6)
                PrintLine(1, Nothing)
                FileClose(1)
                Dim path As String = .FileName

                MsgBox("Sucessfully saved to " & path, MsgBoxStyle.Information)
            End If

        End With

    End Sub

    Private Sub SaveFileDialog1_FileOk(sender As Object, e As System.ComponentModel.CancelEventArgs) Handles SaveFileDialog1.FileOk

    End Sub

    Private Sub ExportToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles ExportToolStripMenuItem.Click
        'OpenFileDialog1.ShowDialog()
        'Dim StrFileName As String
        'Dim tempStr As String = ""

        ' Dim OpenAnswerFile As New OpenFileDialog

        Dim setValue1 As String
        Dim setValue2 As String
        Dim setValue3 As String
        Dim setValue4 As String
        Dim setValue5 As String
        Dim setValue6 As String

        setValue1 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "AdvIntDriverEnabled2", Nothing)

        setValue2 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "FName", Nothing)

        setValue3 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "LName", Nothing)

        setValue4 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Email", Nothing)

        setValue5 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "Serial", Nothing)

        setValue6 = My.Computer.Registry.GetValue _
            ("HKEY_LOCAL_MACHINE\SOFTWARE\Wow6432Node\Internet Download Manager", "InstallStatus", Nothing)

        'With OpenFileDialog1
        'OpenFileDialog1.Filter = "Registration Files (*.reg)|*.reg| All Files (*.*) |*.*"

        'If .ShowDialog = DialogResult.OK Then
        'StrFileName = My.Computer.FileSystem.ReadAllText(OpenAnswerFile.FileName)

        'StrFileName.Skip(25)

        ' For Each myLine In StrFileName
        '  tempStr &= myLine & vbNewLine
        ' Next
        'MsgBox(tempStr)

        ' End If

        'End With




    End Sub

    Private Sub ExitToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles ExitToolStripMenuItem.Click
        End
    End Sub

    Private Sub AboutToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles AboutToolStripMenuItem.Click
        Dim aboutDialog As String

        aboutDialog = "Internet Download Manager Key Viewer and Changer" & Application.ProductVersion & "(64-bit Edition)" & vbNewLine & "Written by : Suman Thapa" & vbNewLine & "https://www.facebook.com/1nv4d3r"

        MsgBox(aboutDialog, MsgBoxStyle.Information)
    End Sub

    Private Sub OpenFileDialog1_FileOk(sender As Object, e As System.ComponentModel.CancelEventArgs) Handles OpenFileDialog1.FileOk

    End Sub
End Class
