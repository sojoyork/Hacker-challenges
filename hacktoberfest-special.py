# Import everything from tkinter module 
from tkinter import *
import tkinter.messagebox

# Create a tkinter root window 
root = Tk() 

# Root window title and dimension 
root.title("Target Info") 
root.geometry('500x500') 

Label(self.master, text="In this, you need to hack the user!").pack(pady=20)

# Function to show messagebox with target info
def onClick(): 
    tkinter.messagebox.showinfo("Info",  """
    IP: 127.0.1.1
    Password Hash: reservedhacktoberfestname:$y$j9T$Q5IpfnQdvnpOpkZgBrTNm/$iVuWGPXdJvqX3vlKr3EX/JLeTkDakZDixQvvaiY1rq9:19998:0:99999:7:::
    """) 

# Create a Button 
button = Button(root, text="Click Me", command=onClick, height=5, width=10) 

# Set the position of the button in the window. 
button.pack(side='left', padx=50, pady=50)

# Run the main loop
root.mainloop()
