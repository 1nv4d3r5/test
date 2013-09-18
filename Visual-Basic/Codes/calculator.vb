Public Class Form1
    Dim addition1 As Integer
    Dim subtraction1 As Integer
    Dim division1 As Double
    Dim multiplication1 As Integer
    Dim result As Integer
    Dim choice As String
    Private Sub ZERO_Click(ByVal sender As System.Object, 
              ByVal e As System.EventArgs) Handles ZERO.Click
        TextBox1.Text = TextBox1.Text & ZERO.Text
    End Sub
    Private Sub ONE_Click(ByVal sender As System.Object, 
              ByVal e As System.EventArgs) Handles ONE.Click
        TextBox1.Text = TextBox1.Text & ONE.Text
    End Sub

    Private Sub TWO_Click(ByVal sender As System.Object, 
              ByVal e As System.EventArgs) Handles TWO.Click
        TextBox1.Text = TextBox1.Text & TWO.Text
    End Sub

    Private Sub THREE_Click(ByVal sender As System.Object, 
              ByVal e As System.EventArgs) Handles THREE.Click
        TextBox1.Text = TextBox1.Text & THREE.Text
    End Sub

    Private Sub FOUR_Click(ByVal sender As System.Object, 
              ByVal e As System.EventArgs) Handles FOUR.Click
        TextBox1.Text = TextBox1.Text & FOUR.Text
    End Sub

    Private Sub FIVE_Click(ByVal sender As System.Object, 
              ByVal e As System.EventArgs) Handles FIVE.Click
        TextBox1.Text = TextBox1.Text & FIVE.Text
    End Sub

    Private Sub SIX_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles SIX.Click
        TextBox1.Text = TextBox1.Text & SIX.Text
    End Sub

    Private Sub SEVEN_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles SEVEN.Click
        TextBox1.Text = TextBox1.Text & SEVEN.Text
    End Sub

    Private Sub EIGHT_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles EIGHT.Click
        TextBox1.Text = TextBox1.Text & EIGHT.Text
    End Sub

    Private Sub NINE_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles NINE.Click
        TextBox1.Text = TextBox1.Text & NINE.Text
    End Sub

    Private Sub Plus_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles Plus.Click
        addition1 = Val(TextBox1.Text)
        TextBox1.Clear()
        choice = "plus"
    End Sub

    Private Sub Button12_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles Button12.Click
        Select Case choice
            Case "plus"
                result = addition1 + Val(TextBox1.Text)
                TextBox1.Text = Str(result)
            Case "minus"
                result = subtraction1 - Val(TextBox1.Text)
                TextBox1.Text = Str(result)
            Case "division"
                result = division1 / Val(TextBox1.Text)
                TextBox1.Text = Str(result)
            Case "multiplication"
                result = multiplication1 * Val(TextBox1.Text)
                TextBox1.Text = Str(result)
        End Select
    End Sub

    Private Sub Button11_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles Button11.Click
        TextBox1.Clear()
    End Sub

    Private Sub Minus_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles Subtract.Click
        subtraction1 = 0
        subtraction1 = Val(TextBox1.Text)
        TextBox1.Clear()
        choice = "minus"
    End Sub

    Private Sub Divide_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles Divide.Click
        division1 = Val(TextBox1.Text)
        TextBox1.Clear()
        choice = "division"
    End Sub

    Private Sub Multiply_Click(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles Multiply.Click
        multiplication1 = Val(TextBox1.Text)
        TextBox1.Clear()
        choice = "multiplication"
    End Sub
    
    Private Sub Form1_Load(ByVal sender As System.Object, 
             ByVal e As System.EventArgs) Handles MyBase.Load
    End Sub
  End Class
