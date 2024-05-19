import pandas as pd
def start():
    file=open('manufacturers.txt',"w")

    data=pd.read_excel('BatterySuggestions.xlsx',sheet_name="Table formatted",usecols=['MANUFACTURER','MODEL','YEAR','MVG SIZE','JIS CODE'])
    manufacturer=data.to_dict(orient='records')
    stringed_manufacturer=str(manufacturer)
    php_formatted_dict=""
    for char in stringed_manufacturer:
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