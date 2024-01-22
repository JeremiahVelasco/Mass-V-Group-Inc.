import pandas as pd
import pymysql

conn=pymysql.connect(
    host='localhost',
    user='root',
    password='',
    database='laravel'
)
cursor=conn.cursor()
data=pd.read_excel('BatteryProduct.xlsx','Sheet1')

battery_dictonary=data.to_dict(orient='records')

for info in battery_dictonary:
    input_asset=info['ASSET']
    input_mvg_size=info['MVGI SIZE']
    input_jis_code=info['JIS CODE']
    input_warranty=info['WARRANTY']
    input_name=info['MVG NAME']
    cursor.execute("INSERT INTO battery_product_list (asset,mvgi_size,jis_code,warranty,name) VALUES (%s, %s, %s, %s,%s)",(input_asset,input_mvg_size,input_jis_code,input_warranty,input_name))
conn.commit()
conn.close()
print("Successfully added battery product list onto the database")