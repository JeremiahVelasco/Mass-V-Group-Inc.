import pandas as pd
import pymysql

conn=pymysql.connect(
    host='localhost',
    user='root',
    password='',
    database='laravel'
)
cursor=conn.cursor()
data=pd.read_excel('BatterySuggestions.xlsx',sheet_name="Table formatted",usecols=['MANUFACTURER','MODEL','YEAR','MVG SIZE','JIS CODE'])
manufacturer=data.to_dict(orient='records')

for info in manufacturer:
    if pd.isna(info['MANUFACTURER']):
        print(info)
        break
    elif pd.isna(info['MODEL']):
        print(info)
        break
    elif pd.isna(info['YEAR']):
        print(info)
        break
    elif pd.isna(info['MVG SIZE']):
        print(info)
        break
    elif pd.isna(info['JIS CODE']):
        print(info)
        break
    else:
        print("No nan data found")
        break

for info in manufacturer:
    input_manu=info['MANUFACTURER']
    input_model=info['MODEL']
    input_year=info['YEAR']
    input_mvg=info['MVG SIZE']
    input_jis=info['JIS CODE']
    cursor.execute("INSERT INTO manufacturers (name,model,year,mvg_size,jis_code) VALUES (%s, %s, %s, %s,%s)",(input_manu,input_model,input_year,input_mvg,input_jis))
conn.commit()
conn.close()
print("Successfully added suggestions onto the database")