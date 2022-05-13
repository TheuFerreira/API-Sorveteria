using API_Sorveteria.Interfaces;
using API_Sorveteria.Models;
using MySqlConnector;
using System.Data;

namespace API_Sorveteria.Repositories
{
    public class CategoryRepository : ICategoryRepository
    {
        private const string CONNECTION_STRING = "Server=localhost;Port=3306;Database=sorveteria;Uid=root;";

        public IList<Category> GetAll()
        {
            MySqlConnection connection = new (CONNECTION_STRING);
            connection.Open();

            string sql = "SELECT id_category, description, path FROM category ORDER BY description;";
            MySqlCommand command = new (sql, connection);
            MySqlDataReader reader = command.ExecuteReader(CommandBehavior.CloseConnection);

            IList<Category> categories = new List<Category>();
            while (reader.Read())
            {
                int idCategory = reader.GetInt16(0);
                string description = reader.GetString(1);
                string? path = null; 
                
                if (!reader.IsDBNull(2))
                    path = reader.GetString(2);

                Category type = new() 
                {
                    IdCategory = idCategory,
                    Description = description,
                    Path = path
                };

                categories.Add(type);
            }

            connection.Close();

            return categories;
        }
    }
}
