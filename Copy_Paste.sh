#! /usr/bin/bash

# Enter the source and destination directory paths below
source_dir="/path/to/source/directory"
dest_dir="/path/to/destination/directory"

# Enter the filename of the file you want to copy
file_name="example.txt"

# Use the 'cp' command to copy the file from source directory to destination directory
cp "${source_dir}/${file_name}" "${dest_dir}/${file_name}"

# Print a success message
echo "File ${file_name} has been successfully copied from ${source_dir} to ${dest_dir}."

