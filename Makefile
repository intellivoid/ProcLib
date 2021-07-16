clean:
	rm -rf build

update:
	ppm --generate-package="src/ProcLib"

build:
	mkdir build
	ppm --no-intro --compile="src/ProcLib" --directory="build"

install:
	ppm --no-intro --no-prompt --fix-conflict --install="build/net.intellivoid.proclib.ppm"