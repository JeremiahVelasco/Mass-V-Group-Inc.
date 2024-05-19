import pandas as pd

def start():
    file=open('products.txt','w')
    data=pd.read_excel('BatteryProduct.xlsx','Sheet1')
    product=data.to_dict(orient='records')
    stringed_product=str(product)
    php_formatted_dict=""
    for char in stringed_product:
        if char== "{":
            php_formatted_dict+="["
        elif char=="}":
            php_formatted_dict+="]"
        elif char==":":
            php_formatted_dict+="=>"
        else:
            php_formatted_dict+=char
    file.write(php_formatted_dict)
    file.close()
