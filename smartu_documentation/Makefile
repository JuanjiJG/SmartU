all: doc

# Generación del PDF compilando el archivo LaTeX con pdflatex
# Con el objetivo de generar los enlaces dentro del documento,
# se compila el mismo fichero dos veces
doc:
	@echo "Compilando documentación del proyecto..."
	cd text; \
	pdflatex -shell-escape -synctex=1 -interaction=nonstopmode -output-directory=../ documentacion.tex; \
	pdflatex -shell-escape -synctex=1 -interaction=nonstopmode -output-directory=../ documentacion.tex; \
	cd ..; \
	mv documentacion.pdf Jimenez_Garcia_Juan_Jose.pdf

# Limpia los archivos compilados, así como los archivos objeto y los paquetes zip
.PHONY: clean
clean:
	@echo "Limpiando archivos de compilación..."
	@rm -f {*.aux,*.lof,*.log,*.lol,*.lot,*.out,*.synctex.gz,*toc}
