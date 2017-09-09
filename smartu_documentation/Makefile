all: clean doc

# Generación del PDF compilando el archivo LaTeX con pdflatex

# Con el objetivo de generar los enlaces dentro del documento,
# se compila el mismo fichero dos veces.

# IMPORTANTE: Dado que se está utilizando TeXLive en Windows,
# el comando pdflatex incluye la extensión .exe, debiendo eliminarse
# en caso de querer ejecutar este Makefile sobre Linux.
doc:
	@echo "Compilando documentación del proyecto..."
	cd text; \
	pdflatex.exe -shell-escape -synctex=1 -interaction=nonstopmode -output-directory=../ documentation.tex; \
	pdflatex.exe -shell-escape -synctex=1 -interaction=nonstopmode -output-directory=../ documentation.tex; \
	cd ..; \
	mv documentation.pdf Jimenez_Garcia_Juan_Jose.pdf

# Limpia los archivos compilados, así como los archivos objeto y los paquetes zip
.PHONY: clean
clean:
	@echo "Limpiando archivos de compilación..."
	@rm -fv *.aux *.lof *.log *.lol *.lot *.out *.synctex.gz *.toc *.glo *.glsdefs *.ist
