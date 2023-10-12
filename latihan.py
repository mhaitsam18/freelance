data = int(input("Masukkan Data :"))
if data % 2 == 0:
    print("Angka Genap")
else:
    print("Angka Ganjil")

jarak = int(input("Masukkan Jarak Perjalanan (KM) :"))
if jarak <= 5:
    hasil = jarak * 1000
    res = "{:,.2f}".format(hasil)
    print("Biaya = Rp.", res)
elif int(jarak) <= 10:
    hasil = jarak * 900
    res = "{:,.2f}".format(hasil)
    print("Biaya = Rp.", res)
else:
    hasil = jarak * 800
    res = "{:,.2f}".format(hasil)
    print("Biaya = Rp.", res)
