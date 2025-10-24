#!/bin/bash
# Script para copiar el proyecto techreok.com a un servidor Debian por SSH usando rsync


# Configuración
SRC_DIR="$(pwd)/"  # Directorio actual (raíz del proyecto)
DEST_USER="mcantu"
DEST_HOST="192.168.100.41"
DEST_PATH="/home/mcantu/techreok.com"
# Ruta absoluta de la llave SSH en Cygwin/Git Bash (ajusta si es necesario)
SSH_KEY="/cygdrive/c/Users/\"Marco Cantu\"/.ssh/mcantu_keys-20250113T042235Z-001/mcantu_keys/id_rsa"

# Excluir archivos/carpetas innecesarios (ajusta según tus necesidades)
EXCLUDES=(
  --exclude ".git"
  --exclude "node_modules"
  --exclude "logs/*"
  --exclude "data/*"
)

# Comando rsync
rsync -avz "${EXCLUDES[@]}" -e "ssh -i $SSH_KEY" "$SRC_DIR" "${DEST_USER}@${DEST_HOST}:$DEST_PATH"

# Mensaje final
echo "\n✅ Proyecto copiado exitosamente a ${DEST_USER}@${DEST_HOST}:${DEST_PATH}"