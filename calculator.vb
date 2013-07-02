Public Class calculator
    Private isAdding As Boolean = False
    Private isSubtracting As Boolean = False
    Private isDividing As Boolean = False
    Private isMultiplying As Boolean = False
    Private isPower As Boolean = False
    Private isPI As Boolean = False

    Private Sub btnAdd_Click(sender As Object, e As EventArgs) Handles btnAdd.Click
        If txtNum1.Text.Length <> 0 And txtNum2.Text.Length <> 0 And isAdding = False Then
            Dim answer As Double = add(CType(txtNum1.Text, Double), CType(txtNum2.Text, Double))
            txtAnswer.Text = answer
            'txtNum2.Clear()
            txtNum2.ReadOnly = True
            isAdding = True
        ElseIf isAdding Then
            Dim answer As Double = add(CType(txtNum1.Text, Double), CType(txtAnswer.Text, Double))
            txtAnswer.Text = answer.ToString()
        Else
            MessageBox.Show("Please fill all the fields!", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning)
        End If
    End Sub

    Private Sub btnSubtract_Click(sender As Object, e As EventArgs) Handles btnSubtract.Click
        If txtNum1.Text.Length <> 0 And txtNum2.Text.Length <> 0 And isSubtracting = False Then
            Dim answer As Double = subtract(CType(txtNum1.Text, Double), CType(txtNum2.Text, Double))
            txtAnswer.Text = answer
            txtNum2.ReadOnly = True
            isSubtracting = True
        ElseIf isSubtracting Then
            Dim answer As Double = subtract(CType(txtNum1.Text, Double), CType(txtAnswer.Text, Double))
            txtAnswer.Text = answer.ToString()
        Else
            MessageBox.Show("Please fill all the fields!", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning)

        End If
    End Sub

    Private Sub btnDivide_Click(sender As Object, e As EventArgs) Handles btnDivide.Click
        If txtNum1.Text.Length <> 0 And txtNum2.Text.Length <> 0 And isDividing = False Then
            Dim answer As Double = divide(CType(txtNum1.Text, Double), CType(txtNum2.Text, Double))
            txtAnswer.Text = answer
            txtNum2.ReadOnly = True
            isDividing = True
        ElseIf isDividing Then
            Dim answer As Double = divide(CType(txtNum1.Text, Double), CType(txtAnswer.Text, Double))
            txtAnswer.Text = answer.ToString()
        Else
            MessageBox.Show("Please fill all the fields!", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning)
        End If
    End Sub

    Private Sub btnMultiply_Click(sender As Object, e As EventArgs) Handles btnMultiply.Click
        If txtNum1.Text.Length <> 0 And txtNum2.Text.Length <> 0 And isMultiplying = False Then
            Dim answer As Double = multiply(CType(txtNum1.Text, Double), CType(txtNum2.Text, Double))
            txtAnswer.Text = answer
            txtNum2.ReadOnly = True
            isMultiplying = True
        ElseIf isMultiplying Then
            Dim answer As Double = multiply(CType(txtNum1.Text, Double), CType(txtAnswer.Text, Double))
            txtAnswer.Text = answer.ToString()

        Else
            MessageBox.Show("Please fill all the fields!", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning)
        End If

    End Sub

    Private Sub btnPower_Click(sender As Object, e As EventArgs) Handles btnPower.Click
        If txtNum1.Text.Length <> 0 And txtNum2.Text.Length <> 0 And isPower = False Then


            Dim answer As Double = power(CType(txtNum1.Text, Double), CType(txtNum2.Text, Double))
            txtAnswer.Text = answer
            txtNum2.ReadOnly = True
            isPower = True

        ElseIf isPower Then
            Dim answer As Double = power(CType(txtNum1.Text, Double), CType(txtNum2.Text, Double))
            txtAnswer.Text = answer.ToString()
        Else
            MessageBox.Show("Please fill all the fields!", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning)


        End If
    End Sub

    Private Sub btnPI_Click(sender As Object, e As EventArgs) Handles btnPI.Click
        If txtNum1.Text.Length <> 0 And txtNum2.Text.Length <> 0 And isPI = False Then

            txtNum2.ReadOnly = True
            Dim answer As Double = pi(CType(txtNum1.Text, Double))
            txtAnswer.Text = answer
            txtNum2.ReadOnly = True
            isPI = True

        ElseIf isPI Then
            Dim answer As Double = pi(CType(txtNum1.Text, Double))
            txtAnswer.Text = answer.ToString()
        Else
            MessageBox.Show("Please fill all the fields!", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning)
        End If

    End Sub

    Private Function add(ByVal num1 As Double, ByVal num2 As Double) As Double
        Return num1 + num2
    End Function

    Private Function subtract(ByVal num1 As Double, ByVal num2 As Double) As Double
        Return num1 - num2
    End Function

    Private Function divide(ByVal num1 As Double, ByVal num2 As Double) As Double
        Return num1 / num2
    End Function

    Private Function multiply(ByVal num1 As Double, ByVal num2 As Double) As Double
        Return num1 * num2

    End Function

    Private Function power(ByVal num1 As Double, ByVal num2 As Double) As Double
        Return Math.Pow(num1, num2)

    End Function

    Private Function pi(ByVal num1 As Double) As Double
        Return num1 * Math.PI
    End Function

    Private Sub btnClear_Click(sender As Object, e As EventArgs) Handles btnClear.Click
        txtNum2.ReadOnly = False
        revertBool()
        txtNum1.Clear()
        txtAnswer.Clear()
        txtNum2.Clear()

    End Sub
    Private Sub revertBool()
        isAdding = False
        isSubtracting = False
        isDividing = False
        isMultiplying = False
        isPower = False
        isPI = False


    End Sub
End Class
