# import tkinter module 
from tkinter import *
  
# import other necessery modules 
import random 
import time 
import datetime 
  
# creating root object 
root = Tk() 
  
# defining size of window 
root.geometry("2000x7200") 
  
Tops = Frame(root, width = 1600, relief = SUNKEN) 
Tops.pack(side = TOP) 
  
f1 = Frame(root, width = 800, height = 700, 
                            relief = SUNKEN) 
f1.pack(side = LEFT) 
  
# ============================================== 
#                  TIME 
# ============================================== 
localtime = time.asctime(time.localtime(time.time())) 
  
lblInfo = Label(Tops, font = ('OCR A Extended', 36, 'bold'), 
          text = "Cryptography \n Custom cipher \n\n By Mohamad Kanso \n(The Heathland School)", 
                     fg = "Green", bd = 10, anchor='w') 
                      
lblInfo.grid(row = 0, column = 0) 
  
lblInfo = Label(Tops, font=('arial', 18, 'bold'), 
             text = localtime, fg = "LightGreen", 
                           bd = 10, anchor = 'w') 
                          
lblInfo.grid(row = 1, column = 0) 
  
rand = StringVar() 
Msg = StringVar() 
key = StringVar() 
mode = StringVar() 
Result = StringVar() 
  
# exit function 
def qExit(): 
    root.destroy() 
  
# Function to reset the window 
def Reset(): 
    rand.set("") 
    Msg.set("") 
    key.set("") 
    mode.set("") 
    Result.set("") 
  
  
# reference 
lblReference = Label(f1, font = ('Calisto MT', 18, 'italic', 'bold'), 
                text = "Name", bd = 16, anchor = "w") 
                  
lblReference.grid(row = 0, column = 0) 
  
txtReference = Entry(f1, font = ('Calisto MT', 16, 'bold'), 
               textvariable = rand, 
                        bg = "LightGrey", justify = 'right') 
                          
txtReference.grid(row = 0, column = 1) 
  
# labels 
lblMsg = Label(f1, font = ('Calisto MT', 18, 'italic', 'bold'), 
         text = "Message/Data", bd = 16, anchor = "w") 
           
lblMsg.grid(row = 1, column = 0) 
  
txtMsg = Entry(f1, font = ('Calisto MT', 16, 'bold'), 
         textvariable = Msg, 
                bg = "LightGrey", justify = 'right') 
                  
txtMsg.grid(row = 1, column = 1) 
  
lblkey = Label(f1, font = ('Calisto MT', 18, 'bold', 'italic'), 
            text = "Key (numbers and letters only, not case sensitive)", bd = 16, anchor = "w") 
              
lblkey.grid(row = 2, column = 0) 
  
txtkey = Entry(f1, font = ('Calisto MT', 16, 'bold'), 
         textvariable = key, 
                bg = "LightGrey", justify = 'right') 
                  
txtkey.grid(row = 2, column = 1) 
  
lblmode = Label(f1, font = ('Calisto MT', 18, 'bold', 'italic'), 
          text = "Mode (e = encrypt, d = decrypt)", 
                                bd = 16, anchor = "w") 
                                  
lblmode.grid(row = 3, column = 0) 
  
txtmode = Entry(f1, font = ('Calisto MT', 16, 'bold'), 
          textvariable = mode, 
                  bg = "LightGrey", justify = 'right') 
                    
txtmode.grid(row = 3, column = 1) 
  
lblService = Label(f1, font = ('Calisto MT', 18, 'bold', 'italic'), 
             text = "Result : ", bd = 16, anchor = "w") 
               
lblService.grid(row = 2, column = 2) 
  
txtService = Entry(f1, font = ('Calisto MT', 16, 'bold'),  
             textvariable = Result, 
                       bg = "LightGrey", justify = 'right') 
                         
txtService.grid(row = 2, column = 3) 
  
#  The custom cipher 

#The encryption scheme

import re 
import math

def encode(k1,k2,plaintext):
  sec = plaintext

  #Encode the plaintext into integers in [0, 255]
  encoded_plaintext = [ord(c) for c in sec]
  plaintext_length = len(encoded_plaintext) 
  x = []
  y = []
  x = [k1]
  y = [k2]
  r = 3.999998
  s = 3.999999
  N = plaintext_length

  #The shuffling phase

  #Generate a pseudorandom sequence using the generator for shuffling
  for n in range(0,N-1):
    x.append(r*x[n]*(1.-x[n]))
    y.append(s*y[n]*(1.-y[n]));

  key_stream = []
  key_stream = [(((37*x[j] + 17*y[j])%1)) for j in range(0, N)]
  
  #Sort the encoded message according to the generated sequence key_stream
  ss = sorted(range(N), key=lambda k: key_stream[k])

  #Generate the shuffled encoded plaintext sequene
  shuffled_encoded_plaintext = []
  shuffled_encoded_plaintext = [encoded_plaintext[i] for i in ss]
  
  #The masking scheme

  #Generate a pseudorandom sequence using the generator for masking
  key_stream = [math.floor(256*((37*x[j] + 17*y[j])%1)) for j in range(0, N)]

  #Mask the sequence resulting from the shuffling phase with the generated sequence key_stream
  encoded_ciphertext = []
  encoded_ciphertext = [(shuffled_encoded_plaintext[i] + key_stream[i])%256 for i in range(0, N)]

  #Generate the ciphertext
  enc = []
  for cipher_char in encoded_ciphertext:
    enc.append(chr(cipher_char))

  return "".join(enc)



#The inverse permutation function for unshuffing
def inv(perm):
    inverse = [0] * len(perm)
    for i, p in enumerate(perm):
        inverse[p] = i
    return inverse

#The decryption scheme
def decode(k1,k2,enc):
    sec = enc

    #Encode the ciphertext into integers in [0, 255]
    encoded_ciphertext = [ord(c) for c in sec]
    ciphertext_length = len(encoded_ciphertext) 
    x = []
    y = []
    x = [k1]
    y = [k2]
    r = 3.999998
    s = 3.999999
    N = ciphertext_length

    #Generate a pseudorandom sequence using the generator for masking
    for n in range(0,N-1):
      x.append(r*x[n]*(1.-x[n]))
      y.append(s*y[n]*(1.-y[n]));

    #Mask the sequence resulting from the shuffling phase with the generated sequence key_stream
    key_stream = []
    key_stream = [math.floor(256*((37*x[j] + 17*y[j])%1)) for j in range(0, N)]
    shuffled_encoded_plaintext = []
    shuffled_encoded_plaintext = [(encoded_ciphertext[i] - key_stream[i])%256 for i in range(0, N)]


    #The shuffling phase for decryption
    
    #Generate a pseudorandom sequence using the generator for shuffling 
    key_stream = [(((37*x[j] + 17*y[j])%1)) for j in range(0, N)]
    #Sort the encoded message according to the generated sequence key_stream
    ss = sorted(range(N), key=lambda k: key_stream[k])
    perm = ss

    #Apply the inverse permutation function
    h = inv(perm)
    encoded_plaintext = []
    encoded_plaintext = [shuffled_encoded_plaintext[i] for i in h]

    #Generate the plaintext
    dec = []
    for plaintext_char in encoded_plaintext:
        dec.append(chr(plaintext_char))

    return "".join(dec)



def Ref(): 
    #print("Message= ", (Msg.get())) 
  
    clear = Msg.get() 
    k  = key.get()
    k1 = int(k, 36)%256/256
    k2 = int(k, 36)%256/256/math.pi
    m  = mode.get() 
  
    if (m == 'e'): 
        Result.set(encode(k1,k2, clear)) 
    elif (m == 'd'):
        Result.set(decode(k1,k2, clear))
    else:
        print("Wrong command")
  
# Show message button 
btnTotal = Button(f1, padx = 16, pady = 8, bd = 16, fg = "white", 
                        font = ('arial', 16, 'bold'), width = 10, 
                       text = "Show Message", bg = "green", 
                         command = Ref).grid(row = 7, column = 1) 
  
# Reset button 
btnReset = Button(f1, padx = 16, pady = 8, bd = 16, 
                  fg = "white", font = ('arial', 16, 'bold'), 
                    width = 10, text = "Reset", bg = "purple", 
                   command = Reset).grid(row = 7, column = 2) 
  
# Exit button 
btnExit = Button(f1, padx = 16, pady = 8, bd = 16,  
                 fg = "white", font = ('arial', 16, 'bold'), 
                      width = 10, text = "Exit", bg = "red", 
                  command = qExit).grid(row = 7, column = 3) 
  
# keeps window alive 
root.mainloop() 
