<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="signup.aspx.cs" Inherits="WebGroup.signup" %>
<!Doctype html />
<head>
<title>GEETA | Sign Up</title>
<link rel="icon" href="img/core-img/favicon.png">

<style>
    
    body
    {
        background-color: #940128;
        padding-top: 40px;

    }
    table
    {
        background-color: #f4d2e2;
        padding: 30px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }
    
    .button 
    {
        display: inline-block;
        min-width: 120px;
        height: 30px;
        color: #ffffff;
        border: none;
        border-radius: 0;
        padding: 0 7px;
        font-size: 14px;
        background-color: #940128;
        font-weight: 400;
    }
    #label3
    {
        font-size: 32px;
        text-align: center;
    }
    
    .form-control {
    display: block;
    font-size: 14px;
    padding: .375rem .75rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
    
</style>

</head>
<body>

    <center><table style="height: 609px; width: 858px">
    <form id="form1" runat="server">
    <tr>
    <td colspan="3">
        <center>
            <asp:Image ID="Image2" runat="server" ImageUrl="img/core-img/gee-2.png" Height="88px" 
            Width="292px" /></center></td>
    </tr>
    <tr>
        <td rowspan="11" class="style1">
                <asp:Image ID="Image1" runat="server" ImageUrl="img/core-img/model.png" 
                    style="margin-right: 0px" height="400px" Width="400px"/>
         </td>
        <td colspan="2">
            <asp:Label ID="Label3" runat="server" Text="REGISTER AN ACCOUNT"></asp:Label></td>
    </tr>
        <tr>           

            <td>
                <asp:Label ID="Label1" runat="server" Text="Name: "></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="registerName" runat="server" required class="form-control" placeholder="Name"></asp:TextBox>
            </td>
        </tr>
        <tr>

            <td>
                <asp:Label ID="Label2" runat="server" Text="Email :"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="registerEmail" runat="server" required class="form-control" placeholder="Email"></asp:TextBox>
            </td>
        </tr>
        <tr>

            <td>
                <asp:Label ID="Label4" runat="server" Text="Password :"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="registerPassword" runat="server" required class="form-control" placeholder="Password"></asp:TextBox>
            </td>
        </tr>
        <tr>

            <td>
                <asp:Label ID="Label5" runat="server" Text="Phone Number :"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="registerPhone" runat="server" required class="form-control" placeholder="Phone Number"></asp:TextBox>
            </td>
        </tr>
        <tr>

            <td>
                <asp:Label ID="Label6" runat="server" Text="Address :"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="registerAddress" runat="server" required class="form-control" placeholder="Address"></asp:TextBox>
            </td>
        </tr>
        <tr>

            <td>
                <asp:Label ID="Label7" runat="server" Text="City :"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="registerCity" runat="server" required class="form-control" placeholder="City"></asp:TextBox>
            </td>
        </tr>
        <tr>

            <td>
                <asp:Label ID="Label8" runat="server" Text="State :"></asp:Label>
            </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" Height="37px" Width="202px" 
                    class="form-control">
                    <asp:ListItem>Terengganu</asp:ListItem>
                    <asp:ListItem>Perlis</asp:ListItem>
                    <asp:ListItem>Selangor</asp:ListItem>
                    <asp:ListItem>Negeri Sembilan</asp:ListItem>
                    <asp:ListItem>Johor</asp:ListItem>
                    <asp:ListItem>Kelantan</asp:ListItem>
                    <asp:ListItem>Perak</asp:ListItem>
                    <asp:ListItem>Kedah</asp:ListItem>
                    <asp:ListItem>Pahang</asp:ListItem>
                    <asp:ListItem>Pulau Pinang</asp:ListItem>
                    <asp:ListItem>Melaka</asp:ListItem>
                    <asp:ListItem>Sabah</asp:ListItem>
                    <asp:ListItem>Sarawak</asp:ListItem>
                    <asp:ListItem>Kuala Lumpur</asp:ListItem>
                    <asp:ListItem>Putrajaya</asp:ListItem>
                </asp:DropDownList>
            </td>
        </tr>
        <tr>

            <td>
                <asp:Label ID="Label9" runat="server" Text="Postal Code :"></asp:Label>
            </td>
            <td>
                <asp:TextBox ID="registerCode" runat="server" required class="form-control" placeholder="Postal Code"></asp:TextBox>
            </td>
        </tr>
        <tr>

            <td colspan="2">
                <center><asp:Button ID="signupBtn" runat="server" Text="Sign up" class="button" 
                        onclick="signupBtn_Click"/></center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>Have an account? <asp:LinkButton ID="LinkButton1" href="login.aspx" runat="server">Login</center></asp:LinkButton>
            </td>
        </tr>
        </form>
    </table></center>
    <br />
    <hr style="width: 900px;"/>
    <center><asp:Label ID="Label10" runat="server" Text="Copyright &copy; 2020 All rights reserved" style="color: White;"></asp:Label></center>

</body>
</html>