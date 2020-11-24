import unicode_string_contain_check as uscc

import sys
from getopt import GetoptError, getopt

phrase = None
keyword = None

def main(argv):
    try:
        opts, rems = getopt(argv,"p:k:",["phrase=","keyword="])
    except GetoptError:
        print("Undefined operations")
        sys.exit(2)

    for opt, arg in opts:
        if opt in ("-p","--phrase"):
            global phrase
            phrase = arg
        elif opt in ("-k","--keyword"):
            global keyword
            keyword = arg
        else:
            print("Undefined operations")
            sys.exit(2)
    
    try:
        if uscc.utf_contain(phrase,keyword):
            print("contains!")
            sys.exit(0)
        else:
            print("not contains!")
            sys.exit(1)
    except IndexError:
        print("Invalid compare")
        sys.exit(2)

if __name__ == "__main__":
    main(sys.argv[1:])